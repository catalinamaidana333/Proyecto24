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
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string',
            'descripcion_drop' => 'nullable|string',
            'diseñador' => 'nullable|string|max:255',
            'año' => 'nullable|integer|min:1900|max:'.date('Y'),
            'material' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|in:activo,inactivo',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'talles' => 'required|array',
            'talles.*.stock' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del producto es obligatorio',
            'categoria_id.required' => 'La categoría es obligatoria',
            'categoria_id.exists' => 'La categoría seleccionada no es válida',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un número',
            'imagen.image' => 'Debe ser un archivo de imagen',
            'imagen.max' => 'La imagen no debe superar 2MB',
            'talles.required' => 'Debes seleccionar al menos un talle',
            'talles.*.stock.min' => 'El stock por talle no puede ser negativo',
        ];
    }
}
