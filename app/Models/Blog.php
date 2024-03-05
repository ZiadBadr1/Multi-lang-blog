<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model implements TranslatableContract
{

    use HasFactory , Translatable ,SoftDeletes;
    public $translatedAttributes = ['title', 'content','tags'];
    protected $fillable= ['image', 'category_id', 'user_id'];

    public function image()
    {
        return ($this->image) ? asset('storage/'.$this->image) : asset('BackendAssets/img/flags/Palestine.png');
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
