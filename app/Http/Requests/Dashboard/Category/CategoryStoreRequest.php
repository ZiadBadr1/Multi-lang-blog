<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
        $categoryRules = [
            'image' => ['nullable'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ];
        foreach (config('app.languages') as $key => $lang) {
            $categoryRules[$key . '.title'] = 'required|string|max:255';
            $categoryRules[$key . '.content'] = 'required|string';
        }
        return $categoryRules;
    }
}
