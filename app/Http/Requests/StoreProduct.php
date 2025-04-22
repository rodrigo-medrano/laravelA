<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|unique:products,name',
            'description'=>'required',
            'stock'=>'required|numeric|min:0',
            'brand'=>'required',
            'price'=>'required|numeric|min:0',
            'image'=>'required|file|extensions:jpg,jpeg,png,gif',
            'category_id'=>'required|exists:categories,id'
        ];
    }
    public function messages()
    {
        return [
            'image.extensions'=>'El archivo debe ser de tipo: jpg, jpeg, png, gif',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Nombre',
            'description'=>'Descripción',
            'stock'=>'Stock',
            'brand'=>'Marca',
            'price'=>'Precio',
            'image'=>'Imagen',
            'category_id'=>'Categoría'
        ];
    }
}
