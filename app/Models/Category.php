<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TranslatableContract
{
    use HasFactory ,Translatable , SoftDeletes;
    public  $translatedAttributes = ['title','content'];
    protected $fillable = ['image', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class ,'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class ,'parent_id');
    }

    public function image()
    {
        return ($this->image) ? asset('storage/'.$this->image) : asset('BackendAssets/img/avatars/8.jpg');
    }
}
