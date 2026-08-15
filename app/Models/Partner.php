<?php

namespace App\Models;

use App\Support\PublicDiskMedia;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['name', 'image', 'website', 'is_active', 'sort_order'];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function imagePublicUrl(): ?string
    {
        if (! filled($this->image)) return null;
        return media_public_url(PublicDiskMedia::normalizePath($this->image) ?? $this->image);
    }
}
