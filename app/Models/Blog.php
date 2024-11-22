<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $connection = 'XI'; 
    protected $table = 'blogs';
    protected $primaryKey = 'blogId';

    protected $fillable = [
        'status', 'category', 'uid', 'title', 'short_title', 'excerpt', 'featured_img', 'path', 'slug', 'created_at', 'updated_at', 'content', 'meta_keywords', 'seo'
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'uid', 'uid');
    }
}