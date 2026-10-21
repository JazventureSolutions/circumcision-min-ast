<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SharePointBackupService
{
    public function isEnabled(): bool
    {
        return config('sharepoint.enabled', false);
    }

    public function uploadContent(string $content, string $remotePath, string $contentType = 'text/html'): ?string
    {
        if (! $this->isEnabled()) {
            return null;
        }

        $accessToken = $this->getAccessToken();

        if (! $accessToken) {
            return null;
        }

        $remotePath = trim($remotePath, '/');
        $remoteFolder = trim(dirname($remotePath), '/');

        if ($remoteFolder !== '' && $remoteFolder !== '.' && ! $this->ensureRemoteFolderExists($remoteFolder, $accessToken)) {
            Log::error('SharePoint content upload aborted: remote folder could not be created.', [
                'remote_folder' => $remoteFolder,
            ]);
            return null;
        }

        $uploadUrl = $this->buildUploadUrl($remotePath);

        try {
            $response = Http::withToken($accessToken)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => $contentType,
                ])
                ->timeout(60)
                ->send('PUT', $uploadUrl, ['body' => $content]);

            if ($response->successful()) {
                $json = $this->safeJsonDecode($response->body());
                $sharepointUrl = data_get($json, 'webUrl') ?? data_get($json, 'id');
                return $sharepointUrl;
            }

            Log::error('SharePoint content upload failed.', [
                'remote_path' => $remotePath,
                'status' => $response->status(),
                'body' => $this->sanitizeLogString($response->body()),
            ]);
        } catch (\Exception $e) {
            Log::error('SharePoint content upload exception.', [
                'exception' => $this->sanitizeLogString($e->getMessage()),
                'remote_path' => $remotePath,
            ]);
        }

        return null;
    }

    public function downloadContent(string $remotePath): ?string
    {
        if (! $this->isEnabled()) {
            return null;
        }

        $accessToken = $this->getAccessToken();

        if (! $accessToken) {
            return null;
        }

        $remotePath = trim($remotePath, '/');
        $contentUrl = $this->buildUploadUrl($remotePath);

        try {
            $response = Http::withToken($accessToken)
                ->withHeaders(['Accept' => '*/*'])
                ->timeout(60)
                ->get($contentUrl);

            if ($response->successful()) {
                return $response->body();
            }

            Log::warning('SharePoint content download failed.', [
                'remote_path' => $remotePath,
                'status' => $response->status(),
            ]);
        } catch (\Exception $e) {
            Log::error('SharePoint content download exception.', [
                'exception' => $e->getMessage(),
                'remote_path' => $remotePath,
            ]);
        }

        return null;
    }

    public function deleteByRemotePath(string $remotePath): bool
    {
        if (! $this->isEnabled()) {
            return false;
        }

        $accessToken = $this->getAccessToken();

        if (! $accessToken) {
            return false;
        }

        $remotePath = trim($remotePath, '/');

        $itemUrl = $this->buildItemUrl($remotePath);

        try {
            $metaResponse = Http::withToken($accessToken)
                ->withHeaders(['Accept' => 'application/json'])
                ->timeout(30)
                ->get($itemUrl);

            if (! $metaResponse->successful()) {
                Log::warning('SharePoint delete: could not find item.', [
                    'remote_path' => $remotePath,
                    'status' => $metaResponse->status(),
                ]);
                return false;
            }

            $itemId = data_get($this->safeJsonDecode($metaResponse->body()), 'id');

            if (! $itemId) {
                Log::warning('SharePoint delete: no id in response.', [
                    'remote_path' => $remotePath,
                ]);
                return false;
            }

            $siteId = config('sharepoint.site_id');
            $deleteUrl = "https://graph.microsoft.com/v1.0/sites/{$siteId}/drive/items/{$itemId}";

            $deleteResponse = Http::withToken($accessToken)
                ->timeout(30)
                ->delete($deleteUrl);

            if ($deleteResponse->successful()) {
                Log::info('SharePoint file deleted.', [
                    'remote_path' => $remotePath,
                    'item_id' => $itemId,
                ]);
                return true;
            }

            Log::warning('SharePoint delete failed.', [
                'remote_path' => $remotePath,
                'status' => $deleteResponse->status(),
                'body' => $this->sanitizeLogString($deleteResponse->body()),
            ]);
        } catch (\Exception $e) {
            Log::error('SharePoint delete exception.', [
                'exception' => $e->getMessage(),
                'remote_path' => $remotePath,
            ]);
        }

        return false;
    }

    public function upload(string $localFilePath, string $remotePath): ?string
    {
        if (! $this->isEnabled()) {
            Log::debug('SharePoint upload skipped because SharePoint is disabled.');
            return null;
        }

        if (! file_exists($localFilePath)) {
            Log::warning('SharePoint upload skipped because local file does not exist.', [
                'file' => $localFilePath,
            ]);

            return null;
        }

        $accessToken = $this->getAccessToken();

        if (! $accessToken) {
            return null;
        }

        $remotePath = trim($remotePath, '/');
        $remoteFolder = trim(dirname($remotePath), '/');

        if ($remoteFolder !== '' && ! $this->ensureRemoteFolderExists($remoteFolder, $accessToken)) {
            Log::error('SharePoint upload aborted because remote folder could not be created.', [
                'remote_folder' => $remoteFolder,
                'local_file' => $localFilePath,
            ]);
            return null;
        }

        $uploadUrl = $this->buildUploadUrl($remotePath);

        Log::debug('SharePoint upload attempt.', [
            'upload_url' => $uploadUrl,
            'remote_path' => $remotePath,
            'local_file' => $localFilePath,
        ]);

        try {
            $response = Http::withToken($accessToken)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/pdf',
                ])
                ->timeout(60)
                ->send('PUT', $uploadUrl, ['body' => file_get_contents($localFilePath)]);

            if ($response->successful()) {
                $json = $this->safeJsonDecode($response->body());
                $sharepointUrl = data_get($json, 'webUrl') ?? data_get($json, 'id');
                Log::info('SharePoint upload succeeded.', [
                    'upload_url' => $uploadUrl,
                    'sharepoint_url' => $sharepointUrl,
                    'local_file' => $localFilePath,
                ]);
                return $sharepointUrl;
            }

            Log::error('SharePoint upload failed.', [
                'upload_url' => $uploadUrl,
                'status' => $response->status(),
                'body' => $this->sanitizeLogString($response->body()),
                'local_file' => $localFilePath,
            ]);
        } catch (\Exception $e) {
            Log::error('SharePoint upload exception.', [
                'exception' => $this->sanitizeLogString($e->getMessage()),
                'file' => $localFilePath,
                'upload_url' => $uploadUrl,
            ]);
        }

        return null;
    }

    protected function ensureRemoteFolderExists(string $folderPath, string $accessToken): bool
    {
        $siteId = config('sharepoint.site_id');
        $segments = explode('/', trim($folderPath, '/'));
        $currentPath = '';

        foreach ($segments as $segment) {
            $currentPath = $currentPath === '' ? $segment : "{$currentPath}/{$segment}";
            $encodedPath = implode('/', array_map('rawurlencode', explode('/', $currentPath)));
            $checkUrl = "https://graph.microsoft.com/v1.0/sites/{$siteId}/drive/root:/{$encodedPath}";

            $response = Http::withToken($accessToken)
                ->withHeaders(['Accept' => 'application/json'])
                ->timeout(30)
                ->get($checkUrl);

            if ($response->successful()) {
                continue;
            }

            if ($response->status() !== 404) {
                Log::error('SharePoint folder check failed.', [
                    'folder_path' => $currentPath,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return false;
            }

            $parent = dirname($currentPath);
            $parentUrl = $parent === '.' || $parent === ''
                ? "https://graph.microsoft.com/v1.0/sites/{$siteId}/drive/root/children"
                : "https://graph.microsoft.com/v1.0/sites/{$siteId}/drive/root:/" . implode('/', array_map('rawurlencode', explode('/', $parent))) . ":/children";

            $createResponse = Http::withToken($accessToken)
                ->withHeaders(['Accept' => 'application/json'])
                ->timeout(30)
                ->post($parentUrl, [
                    'name' => $segment,
                    'folder' => new \stdClass(),
                    '@microsoft.graph.conflictBehavior' => 'replace',
                ]);

            if (! $createResponse->successful()) {
                Log::error('SharePoint folder creation failed.', [
                    'folder_path' => $currentPath,
                    'status' => $createResponse->status(),
                    'body' => $createResponse->body(),
                ]);
                return false;
            }
        }

        return true;
    }

    protected function getAccessToken(): ?string
    {
        $tenantId = config('sharepoint.tenant_id');
        $clientId = config('sharepoint.client_id');
        $clientSecret = config('sharepoint.client_secret');

        if (! $tenantId || ! $clientId || ! $clientSecret) {
            Log::warning('SharePoint upload skipped because credentials are not configured.');
            return null;
        }

        $response = Http::asForm()->post("https://login.microsoftonline.com/{$tenantId}/oauth2/v2.0/token", [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'scope' => 'https://graph.microsoft.com/.default',
            'grant_type' => 'client_credentials',
        ]);

        if (! $response->successful()) {
            Log::error('SharePoint token request failed.', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return null;
        }

        return $response->json('access_token');
    }

    protected function buildUploadUrl(string $remotePath): string
    {
        $remotePath = trim($remotePath, '/');
        $folder = trim(config('sharepoint.folder', ''), '/');

        if (preg_match('#^(Shared Documents|Documents)/(.*)$#i', $folder, $matches)) {
            $folder = trim($matches[2], '/');
        }

        $path = trim($folder ? "{$folder}/{$remotePath}" : $remotePath, '/');
        $encodedPath = implode('/', array_map('rawurlencode', explode('/', $path)));
        $siteId = config('sharepoint.site_id');

        return "https://graph.microsoft.com/v1.0/sites/{$siteId}/drive/root:/{$encodedPath}:/content";
    }

    protected function buildItemUrl(string $remotePath): string
    {
        $remotePath = trim($remotePath, '/');
        $folder = trim(config('sharepoint.folder', ''), '/');

        if (preg_match('#^(Shared Documents|Documents)/(.*)$#i', $folder, $matches)) {
            $folder = trim($matches[2], '/');
        }

        $path = trim($folder ? "{$folder}/{$remotePath}" : $remotePath, '/');
        $encodedPath = implode('/', array_map('rawurlencode', explode('/', $path)));
        $siteId = config('sharepoint.site_id');

        return "https://graph.microsoft.com/v1.0/sites/{$siteId}/drive/root:/{$encodedPath}";
    }

    protected function safeJsonDecode(string $body): array
    {
        $decoded = json_decode($body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [];
        }

        return $decoded;
    }

    protected function sanitizeLogString(string $value): string
    {
        if (mb_check_encoding($value, 'UTF-8')) {
            return $value;
        }

        $converted = @mb_convert_encoding($value, 'UTF-8', 'UTF-8');
        if ($converted !== false) {
            return $converted;
        }

        return utf8_encode($value);
    }
}
