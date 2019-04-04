<?php

namespace App\Http\Requests;

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
            'product_Name' =>'required|max:255',
            //'product_Name' =>'required|max:255|unique:products',
             'quantity' => 'required',
             'product_price' => 'required|max:10',
             'product_image_1'=> 'required',
             'short_description' => 'required',
             'long_description' => 'required',
             'product_size' => 'required',
             'stock'=> 'required|max:6'
        ];
    }
}
