<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateCourse extends FormRequest
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
        $rules = [
            'name' => [
                'required',
                'min:3',
                'max:255',
                // "unique:courses,name,{$this->course},id",
                Rule::unique('courses')->ignore($this->course)
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

        // if ($this->method() == 'PUT') {
        //     $rules['image'] = [
        //         'nullable',
        //         'image',
        //         'max:2048',
        //     ];
        // }

        return $rules;
    }
}
