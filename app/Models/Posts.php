<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category',
        'tag',
        'author',
        'status',
        'cover_image',
        'document_file',
        'video_file',
        'external_content_url',
    ];

    public function users()
{
    return $this->belongsToMany(User::class, 'bookmark' , 'post_id' , 'user_id')->withTimestamps();
}

}
