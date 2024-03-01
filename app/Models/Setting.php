<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Setting extends Model implements TranslatableContract
{
    use HasFactory, Translatable, SoftDeletes;

    protected $fillable = ['logo', 'favicon', 'email', 'phone', 'facebook', 'linkedin'];
    public $translatedAttributes = ['title', 'content', 'address'];

    public static function Check()
    {
        $setting = Setting::first();
        if (!isset($setting)) {
            $data = [
                'id' => 1,
                'email'=>'blog@blog.com',
                'phone'=> '01125022055',
                'facebook'=> 'blog',
                'linkedin'=> 'blog'
            ];
            foreach (config('app.languages') as $key => $value) {
                $data[$key]['title'] = $value;
                $data[$key]['content'] = $value;
                $data[$key]['address'] = $value;

            }
            Setting::create($data);
        }
        return Setting::first();
    }
}
