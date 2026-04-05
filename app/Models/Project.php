<?php

namespace App\Models;

use App\Support\PublicDiskMedia;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'category',
        'image',
        'project_url',
        'client',
        'duration',
        'location',
        'status',
        'progress',
        'description',
        'details',
    ];

    public function imagePublicUrl(): ?string
    {
        if (! filled($this->image)) {
            return null;
        }

        return media_public_url(PublicDiskMedia::normalizePath($this->image) ?? $this->image);
    }

    /** Resolved image URL for the public site, or theme logo when none is set. */
    public function frontendImageUrl(): string
    {
        return $this->imagePublicUrl() ?? asset('assets/img/logo.svg');
    }
}
