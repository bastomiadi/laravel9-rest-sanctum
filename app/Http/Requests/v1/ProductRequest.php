<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|max:255|unique:products',
            'detail' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|max:10',
            'stock' => 'required|max:6',
            'discount' => 'required|max:2'
        ];
    }
}
