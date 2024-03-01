<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class SettingController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.setting',compact('setting'));
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $attributes =  $request->validated();

        if($request->hasFile('logo'))
        {
            $attributes['logo'] = $this->uploadImage($request,$attributes,'logo','setting');
        }
        if($request->hasFile('favicon'))
        {
            $attributes['favicon'] = $this->uploadImage($request,$attributes,'favicon','setting');
        }
        $setting->update($attributes);

        return redirect()->back()->with('success',"hello ");
    }
}
