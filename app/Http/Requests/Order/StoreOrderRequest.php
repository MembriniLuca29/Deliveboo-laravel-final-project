<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'total_price' => ['required', 'max:999.99'],
            'address' => ['required', 'max:255'],
            'address_number' => ['required', 'max:6'],
            'user_id' => ['required', 'exists:uses,id']
        ];
    }
}
