<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRestaurantRequest extends FormRequest
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
            'p_iva' => ['required' , 'size:11'],
            'type_id' => ['nullable'],
            'thumb' => ['nullable', 'image'],
            'remove_thumb' => ['nullable']
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
            'thumb.image' => 'Caricare un file di tipo .jpg, .png o .svg'
        ];
    }
}
