<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
    public function rules(){
        return [
            'name'=>'required|min:3|max:255|unique:categories',
            'icon'=>'required|image|mimes:jpeg,png,jpg,gif|max:4096'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Category Name is required',
            'name.unique' => 'Duplicate Product Name',
            'icon.required'=>'Icon Required',
            'icon.max' =>'File size exceeded the limit, Max size 4MB.'
        ];
    }
}
