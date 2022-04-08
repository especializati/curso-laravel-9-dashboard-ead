<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateLesson extends FormRequest
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
                Rule::unique('lessons')->ignore($this->lesson)
            ],
            'video' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('lessons')->ignore($this->lesson)
            ],
            'description' => [
                'nullable',
                'min:3',
                'max:9999',
            ],
        ];
    }
}
