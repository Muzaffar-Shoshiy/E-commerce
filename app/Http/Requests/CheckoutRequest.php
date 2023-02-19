<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
    public function rules()
    {
        return [
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'street-address-1' => 'required|string',
            'street-address-2' => 'required|string',
            'country' => 'required',
            'phone' => 'required|regex:/(998)[0-9]{9}/',
            'email' => 'required|email',
            'payment_type' => 'required|in:humo,uzcard,click,payme,cashondelivery'
        ];
    }
}
