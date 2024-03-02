<?php

namespace App\Http\Controllers\Dashboard\Modules\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingUpdateRequest;
use App\Models\Setting;
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

        return redirect()->back()->with('success',__('updated_successfully'));
    }
}
