<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnimeFormRequest extends FormRequest
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
            'category_id' => [   
                'required', 
                'integer'
            ],
            'name' => [
                'required', 
                'string', 
                'max:255'
            ],
            'nb_episode' => [
                'nullable', 
                'integer', 
            ],
            'description' => [
                'required'
            ],
            'date_release' => [
                'nullable', 
                'date', 
            ],
            'studio' => [
                'nullable', 
                'string', 
                'max:255'
            ],
            'tags' => [
                'nullable', 
                'string', 
                'max:255'
            ],
            'yt_iframe' => [
                'nullable', 
                'string', 
                'max:255'
            ],
            'meta_title' => [
                'required', 
                'string', 
                'max:255'
            ],
            'meta_description' => [
                'nullable', 
                'string' 
            ],
            'meta_keyword' => [
                'nullable',
                'string'
            ],
            'image' => [
                'nullable', 
                'mimes:jpeg,bmp,png,gif'
            ],
            'status' => [
                'nullable' 
            ],
            'created_at' => [
                'nullable', 
                'date'
            ],
            'created_by' => [
                'nullable', 
                'integer'
            ],
            'updated_at' => [
                'nullable', 
                'date'
            ],

        ];

        return $rules;
    }
}
