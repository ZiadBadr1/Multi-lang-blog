<?php

namespace App\Http\Requests\Dashboard\Blogs;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
        $blogRules = [
            'image' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ];
        foreach (config('app.languages') as $key => $lang) {
            $blogRules[$key . '.title'] = 'required|string|max:255';
            $blogRules[$key . '.content'] = 'required|string';
            $blogRules[$key . '.tags'] = 'required|string';
        }
        return $blogRules;

    }
}
