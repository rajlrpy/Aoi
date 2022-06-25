<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            'name'=>'required|min:3|max:255|unique:products'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Product Name is required',
            'name.unique' => 'Duplicate Product Name',
        ];
    }
}
