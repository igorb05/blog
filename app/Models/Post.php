<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'content',
      'tag',
      'image',
      'views',
      'slug',
      'author_id',
      'published_at',
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public static function booted(): void
    {
        self::creating(function (Post $post) {
            $post->slug = Str::slug($post->title);
            $post->views = 0;
        });
    }
}
