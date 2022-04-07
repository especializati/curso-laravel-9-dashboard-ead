<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourse extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:255',
                'unique:courses',
            ],
            'image' => [
                'nullable',
                'image',
                'max:1024',
            ],
            'description' => [
                'nullable',
                'min:3',
                'max:9999',
            ],
            'available' => [
                'nullable',
                'boolean'
            ]
        ];
    }
}
