<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreOrderRequest extends FormRequest
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
            'last_name' => ['required', 'max:50'],
            'phone_number' => ['required', 'max:13'],
            'email' => ['required'],
            'address' => ['required'],
            'status' => ['nullable', 'max:50'],
            'total_price' => ['required']
        ];
    }
}
