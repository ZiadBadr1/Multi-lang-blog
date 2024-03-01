<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['blog_id', 'locale', 'title', 'content'];

}
