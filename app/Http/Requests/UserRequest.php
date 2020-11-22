<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|unique:users|max:255|min:5',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên user không để trống!',
            'name.unique' => 'Tên user đã tồn tại!',
            'name.max'  => 'Tên user không quá 255 ký tự.',
            'name.min'  => 'Tên user không thể dưới 5 ký tự.',
        ];
    }
}
