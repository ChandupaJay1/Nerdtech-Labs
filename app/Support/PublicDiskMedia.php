<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class PublicDiskMedia
{
    public static function normalizePath(?string $path): ?string
    {
        if ($path === null) {
            return null;
        }
        $path = ltrim(str_replace('\\', '/', trim($path)), '/');

        return $path === '' ? null : $path;
    }

    /**
     * Paths we own under storage/app/public (not theme assets/).
     */
    public static function isManagedPath(string $path): bool
    {
        $path = self::normalizePath($path) ?? '';

        if ($path === '' || str_starts_with($path, 'assets/')) {
            return false;
        }

        return (bool) preg_match('#^(services|projects)/#', $path);
    }

    public static function deleteIfManaged(?string $path): void
    {
        $path = self::normalizePath($path);
        if ($path !== null && self::isManagedPath($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Store upload under public disk; returns relative path e.g. services/uuid.png
     */
    public static function store(UploadedFile $file, string $folder): string
    {
        $folder = trim(str_replace('\\', '/', $folder), '/');
        $ext = strtolower($file->getClientOriginalExtension() ?: $file->extension() ?: 'bin');
        $allowed = ['png', 'jpg', 'jpeg', 'gif', 'svg', 'webp'];
        if (! in_array($ext, $allowed, true)) {
            $ext = 'png';
        }
        $name = Str::uuid()->toString().'.'.$ext;
        $path = $file->storeAs($folder, $name, 'public');
        if ($path === false) {
            throw new \RuntimeException('Could not store uploaded file.');
        }

        return $path;
    }
}
