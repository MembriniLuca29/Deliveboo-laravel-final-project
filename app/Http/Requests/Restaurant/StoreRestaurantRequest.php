<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRestaurantRequest extends FormRequest
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
            'name' => ['required', 'max:50'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'thumb' => ['nullable', 'max:2048'],
            'p_iva' => ['required' , 'size:11'],
            'type_id' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo è obbligatorio',
            'name.max' => 'Il nome non può superare i 50 caratteri',
            'address.required' => 'Il campo è obbligatorio',
            'phone_number.required' => 'Il campo è obbligatorio',
            'p_iva.required' => 'Il campo è obbligatorio',
            'p_iva.size' => 'Inserire un valore valido',
            'thumb.size' => 'URL immagine troppo lungo'
        ];
    }
}
