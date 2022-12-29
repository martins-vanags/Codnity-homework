<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Articles extends Model
{
    use SoftDeletes, RefreshDatabase;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'points',
        'created_at',
        'updated_at',
        'link',
    ];
}
