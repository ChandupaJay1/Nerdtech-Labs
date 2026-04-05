<?php

use Illuminate\Support\Str;

if (! function_exists('media_public_url')) {
    /**
     * Public URL for uploaded files (storage disk), legacy public/ paths, or theme assets.
     *
     * Uses asset() for storage paths so the host matches the current request (e.g. 127.0.0.1 vs localhost).
     * Storage::disk('public')->url() always uses APP_URL from config and breaks when those differ.
     */
    function media_public_url(?string $path): string
    {
        if ($path === null || $path === '') {
            return '';
        }

        $path = str_replace('\\', '/', $path);
        $path = ltrim($path, '/');

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, 'assets/')) {
            return asset($path);
        }

        if (Str::startsWith($path, 'public/')) {
            return asset(Str::after($path, 'public/'));
        }

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::after($path, 'storage/');
        }

        return asset('storage/'.$path);
    }
}
