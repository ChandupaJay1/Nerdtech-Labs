<?php

namespace App\Models;

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
}
