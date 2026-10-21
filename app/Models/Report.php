<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Template;
use App\Services\SharePointBackupService;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $appendedHtml = null;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function getFileUrlAttribute($value)
    {
        if (!empty($value)) {
            return $value;
        }

        $report_path = config('constants.storage_paths.reports', '');
        $report_path = str_replace('{patient_id}', $this->patient_id, $report_path);
        $report_path = str_replace('{filename}', $this->filename, $report_path);

        return url($report_path);
    }

    public function getHtmlAttribute($value)
    {
        if (!empty($value)) {
            return $value;
        }

        if ($this->appendedHtml !== null) {
            return $this->appendedHtml;
        }

        if ($this->sharepoint_html_url && app(SharePointBackupService::class)->isEnabled()) {
            $decodedUrl = rawurldecode($this->sharepoint_html_url);
            $parsed = parse_url($decodedUrl);
            $urlPath = $parsed['path'] ?? '';

            $folder = config('sharepoint.folder', '');
            if (preg_match('#^(Shared Documents|Documents)/(.*)$#i', $folder, $matches)) {
                $folder = trim($matches[2], '/');
            }

            $pos = strrpos($urlPath, $folder);
            if ($pos !== false) {
                $relativePath = substr($urlPath, $pos + strlen($folder) + 1);
            } else {
                $segments = explode('/', $urlPath);
                $relativePath = end($segments);
            }

            $htmlContent = app(SharePointBackupService::class)->downloadContent($relativePath);
            if ($htmlContent !== null) {
                $this->appendedHtml = $htmlContent;
                return $htmlContent;
            }
        }

        return $value;
    }
}
