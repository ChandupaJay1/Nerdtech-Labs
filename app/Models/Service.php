<?php

namespace App\Models;

use App\Support\PublicDiskMedia;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'image',
        'description',
        'long_description',
        'features',
    ];

    public function coverPublicUrl(): ?string
    {
        if (! filled($this->image)) {
            return null;
        }

        return media_public_url(PublicDiskMedia::normalizePath($this->image) ?? $this->image);
    }

    public function iconFilePublicUrl(): ?string
    {
        if (! filled($this->icon)) {
            return null;
        }
        $p = PublicDiskMedia::normalizePath($this->icon) ?? $this->icon;
        if (! PublicDiskMedia::isManagedPath($p)) {
            return null;
        }

        return media_public_url($p);
    }

    public function iconIsCssClass(): bool
    {
        if (! filled($this->icon)) {
            return false;
        }
        $p = PublicDiskMedia::normalizePath($this->icon) ?? $this->icon;

        return ! PublicDiskMedia::isManagedPath($p);
    }

    /**
     * Homepage / services listing card visual (matches admin: cover → icon file → Boxicon class → placeholder).
     *
     * @return array{mode: 'cover'|'icon'|'class'|'placeholder', url?: string|null, icon_class?: string|null}
     */
    public function frontendCard(): array
    {
        if ($url = $this->coverPublicUrl()) {
            return ['mode' => 'cover', 'url' => $url];
        }
        if ($url = $this->iconFilePublicUrl()) {
            return ['mode' => 'icon', 'url' => $url];
        }
        if ($this->iconIsCssClass()) {
            return ['mode' => 'class', 'icon_class' => trim($this->icon)];
        }

        return ['mode' => 'placeholder', 'url' => asset('assets/img/web.png')];
    }

    /**
     * Service detail hero: prefer cover, then icon file, then large icon class, then placeholder.
     *
     * @return array{mode: 'image'|'class'|'placeholder', url?: string|null, icon_class?: string|null}
     */
    public function frontendDetailHero(): array
    {
        if ($url = $this->coverPublicUrl()) {
            return ['mode' => 'image', 'url' => $url];
        }
        if ($url = $this->iconFilePublicUrl()) {
            return ['mode' => 'image', 'url' => $url];
        }
        if ($this->iconIsCssClass()) {
            return ['mode' => 'class', 'icon_class' => trim($this->icon)];
        }

        return ['mode' => 'placeholder', 'url' => asset('assets/img/web.png')];
    }
}
