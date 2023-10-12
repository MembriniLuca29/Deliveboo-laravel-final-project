<?php

namespace App\Http\Requests\Dish;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

class StoreDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'description' => 'nullable',
            'visible' => 'nullable|boolean',
            'price' => 'required|numeric|min:0.10|max:500',
            'thumb' => 'nullable|max:2048',
            'restaurant_id' => 'required|exists:restaurants,id',
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Il campo è obbligatorio',
        'name.max' => 'Il nome non può superare i 50 caratteri',
        'price.required' => 'Il campo prezzo è obbligatorio.',
        'price.numeric' => 'Il campo è obbligatorio',
        'price.min' => 'Il prezzo deve essere almeno 0.10',
        'price.max' => 'Il prezzo non può superare 500.00',
        'thumb.size' => 'URL immagine troppo lungo',        
    ];
}
}