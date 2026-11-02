<?php

namespace App\Helpers;

use App\Models\Role;
use Illuminate\Support\Str;

/**
 * Builds the absolute URLs of the links that are sent to patients.
 *
 * Example: https://clinicalforms.net/minor-surgery/r/abc123
 *
 * Both the domain and the path prefix are resolved from the role that owns the
 * record, so each workspace is identified by its own link shape. When the
 * feature is disabled the normal application URL is returned, which keeps every
 * link that has already been sent to a patient working.
 */
class PublicLink
{
    /**
     * Cached role names, indexed by role id.
     *
     * @var array<int, string|null>
     */
    protected static $roleNames = [];

    /**
     * Absolute URL of a named route, scoped to the given role.
     *
     * @param  mixed  $role  Role model, role id, role name or null
     */
    public static function make(string $routeName, array $parameters = [], $role = null): string
    {
        if (! static::enabled()) {
            return route($routeName, $parameters);
        }

        $base = static::base($role);

        if ($base === '') {
            return route($routeName, $parameters);
        }

        return rtrim($base, '/') . '/' . ltrim(route($routeName, $parameters, false), '/');
    }

    /**
     * Whether the dedicated public domain should be used.
     */
    public static function enabled(): bool
    {
        if (! filter_var(config('public_links.enabled'), FILTER_VALIDATE_BOOLEAN)) {
            return false;
        }

        return trim((string) config('public_links.domain')) !== '';
    }

    /**
     * Domain plus workspace prefix, without a trailing slash.
     *
     * @param  mixed  $role
     */
    public static function base($role = null): string
    {
        $domain = static::domain($role);

        if ($domain === '') {
            return '';
        }

        $prefix = static::prefix($role);

        return rtrim($domain, '/') . ($prefix === '' ? '' : '/' . $prefix);
    }

    /**
     * Origin (and optional sub path) used for the given role.
     *
     * @param  mixed  $role
     */
    public static function domain($role = null): string
    {
        $raw = static::mapValue((array) config('public_links.domains', []), $role)
            ?? config('public_links.domain');

        $raw = trim((string) $raw);

        if ($raw === '') {
            return '';
        }

        if (! Str::contains($raw, '://')) {
            $raw = config('public_links.scheme', 'https') . '://' . $raw;
        }

        $parts = parse_url($raw);
        $host = $parts['host'] ?? '';

        if ($host === '') {
            return '';
        }

        $origin = ($parts['scheme'] ?? config('public_links.scheme', 'https'))
            . '://' . $host
            . (isset($parts['port']) ? ':' . $parts['port'] : '');

        $path = isset($parts['path']) ? trim($parts['path'], '/') : '';

        return $origin . ($path === '' ? '' : '/' . $path);
    }

    /**
     * Workspace path prefix, resolved from the role name.
     *
     * @param  mixed  $role
     */
    public static function prefix($role = null): string
    {
        $name = static::roleName($role);
        $default = config('public_links.default_prefix');

        if ($name !== null) {
            foreach ((array) config('public_links.prefixes', []) as $key => $value) {
                if (Str::lower(trim((string) $key)) === $name) {
                    return trim((string) $value, '/');
                }
            }

            if ($default === null) {
                return Str::slug($name);
            }
        }

        return $default === null ? '' : trim((string) $default, '/');
    }

    public static function matchesPrefix(string $prefix, $role): bool
    {
        $expected = static::prefix($role);

        return $expected !== '' && Str::lower(trim($prefix, '/')) === Str::lower($expected);
    }

    /**
     * Value of a role keyed map for the given role, falling back to '*'.
     *
     * @param  mixed  $role
     */
    protected static function mapValue(array $map, $role): ?string
    {
        $name = static::roleName($role);

        if ($name !== null) {
            foreach ($map as $key => $value) {
                if (Str::lower(trim((string) $key)) === $name) {
                    return (string) $value;
                }
            }
        }

        foreach ($map as $key => $value) {
            if (trim((string) $key) === '*') {
                return (string) $value;
            }
        }

        return null;
    }

    /**
     * Lower case role name of a role model, id or name.
     *
     * @param  mixed  $role
     */
    protected static function roleName($role): ?string
    {
        if ($role instanceof Role) {
            return static::normalizeName($role->name);
        }

        if (is_object($role)) {
            if (isset($role->role_id)) {
                $role = $role->role_id;
            } elseif (isset($role->name)) {
                return static::normalizeName($role->name);
            } else {
                return null;
            }
        }

        if (is_numeric($role)) {
            $key = (int) $role;

            if (! array_key_exists($key, static::$roleNames)) {
                static::$roleNames[$key] = static::normalizeName(
                    Role::query()->whereKey($key)->value('name')
                );
            }

            return static::$roleNames[$key];
        }

        return is_string($role) ? static::normalizeName($role) : null;
    }

    /**
     * @param  mixed  $name
     */
    protected static function normalizeName($name): ?string
    {
        $name = trim((string) $name);

        return $name === '' ? null : Str::lower($name);
    }
}
