<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => [
                'required', 
                'string', 
                'max:255'
            ],
            'slug' => [
                'required', 
                'string', 
                'max:255'
            ],
            'description' => [
                'required'
            ],
            'image' => [
                'nullable', 
                'mimes:jpeg,bmp,png,gif'
            ],
            'meta_title' => [
                'required', 
                'string', 
                'max:255'
            ],
            'meta_description' => [
                'required', 
                'string' 
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'navbar_status' => [
                'nullable' 
            ],
            'status' => [
                'nullable'
            ],
        ];

        return $rules;
    }
}
