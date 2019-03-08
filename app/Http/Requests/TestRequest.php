<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'lat.required' => ':attribute is required',
            'lng.required' => ':attribute is required.',
            'lat.numeric' => ':attribute is\'t a number.',
            'lng.numeric' => ':attribute is\'t a number.',
        ];
    }
    public function attributes()
    {
        return [
            'lat' => 'latitude',
            'lng' => 'length',
        ];
    }

}
