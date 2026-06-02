<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del producto es obligatorio',
            
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un número',
            'stock.required' => 'El stock es obligatorio',
            'imagen.image' => 'Debe ser un archivo de imagen',
            'imagen.max' => 'La imagen no debe superar 2MB',
        ];
    }
}
