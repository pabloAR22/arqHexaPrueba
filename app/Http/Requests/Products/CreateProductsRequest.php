<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|',
            'stock' => 'required|numeric|min:1',
        ];
    }
}
