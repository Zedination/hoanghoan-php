<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title' => 'required|unique:abouts|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên không được để trống',
            'title.unique' => 'Tên không được để trùng',
            'image.required' => 'Ảnh không được để trống',
            'image.image' => 'Ảnh không đúng định dạng'
        ];
    }
}
