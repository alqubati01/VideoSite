<?php

namespace App\Http\Requests\BackEnd\Videos;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer'],
            'name' => ['required', 'max:255'],
            'description' => ['required', 'min:10'],
            'youtube' => ['required', 'min:10', 'url'],
            'published' => ['required'],
            'image' => ['nullable', 'image'],
            'meta_keyword' => ['max:255'],
            'meta_description' => ['max:255']
        ];
    }
}
