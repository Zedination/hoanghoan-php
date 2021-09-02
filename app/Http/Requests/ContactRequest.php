<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'bail|required|max:255|min:5',
            'email' => 'required',
            'phone' => 'required',
            'contents'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không để trống!',
            'name.max'  => 'Tên sản phẩm không quá 255 ký tự.',
            'name.min'  => 'Tên sản phẩm không thể dưới 5 ký tự.',
            'email.required' => 'Email không để trống!',
            'contents.required' => 'Nội dung không để trống!',
        ];
    }
}
