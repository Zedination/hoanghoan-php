<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:5',
            'price' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không để trống!',
            'name.unique' => 'Tên sản phẩm không thể trùng!',
            'name.max'  => 'Tên sản phẩm không quá 255 ký tự.',
            'name.min'  => 'Tên sản phẩm không thể dưới 5 ký tự.',
            'price.required' => 'Giá sản phẩm không để trống!',
            'category_id.required' => 'Tên danh mục không để trống!',
        ];
    }
}
