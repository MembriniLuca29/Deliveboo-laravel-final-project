<?php

namespace App\Http\Requests\Dish;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

class UpdateDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::chec();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'ingridients' => 'required|array|min:1|max:40',
            'ingredients.*' => 'required|string|max:200',
            'price' => 'required|numeric|min:0.10|max:500',

        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Il campo nome è obbligatorio.',
        'name.max' => 'Il campo nome non può superare i 255 caratteri.',
        'ingredients.required' => 'Inserisci almeno un ingrediente.',
        'ingredients.array' => 'Gli ingredienti devono essere in un formato di array.',
        'ingredients.min' => 'Inserisci almeno un ingrediente.',
        'ingredients.max' => 'Ha davvero più di 40 ingredienti.',
        'ingredients.*.required' => 'Ogni ingrediente è obbligatorio.',
        'ingredients.*.max' => 'Ogni ingrediente non può superare i 200 caratteri.',
        'price.required' => 'Il campo prezzo è obbligatorio.',
        'price.numeric' => 'Il campo prezzo deve essere un numero.',
        'price.min' => 'Il prezzo deve essere almeno 0.10.',
        'price.max' => 'Il prezzo non può superare 500.00.',
    ];
}
}