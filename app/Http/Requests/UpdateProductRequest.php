<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:products,name,'.$this->product->id,
            'category_id'=>'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Product Name is required',
            'category_id.required'=>'Category Name is required.',
            'name.unique' => 'Duplicate Product Name',
        ];
    }
}
