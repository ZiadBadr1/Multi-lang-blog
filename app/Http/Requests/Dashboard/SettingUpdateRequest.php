<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $settingRoles = [
            'logo' => ['nullable','mimes:jpg,png,jpeg'],
            'favicon' => ['nullable','mimes:jpg,png,jpeg'],
            'email' => ['required', 'email', 'max:254'],
            'phone' => ['required'],
            'facebook' => ['nullable'],
            'linkedin' => ['nullable'],
        ];
        foreach (config('app.languages') as $key => $lang) {
            $settingRoles[$key . '.title'] = 'required|string|max:255';
            $settingRoles[$key . '.content'] = 'required|string';
            $settingRoles[$key . '.address'] = 'required|string|max:255';
        }
        return $settingRoles ;
    }
}
