<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'seller_name' => 'required|string|max:255',
            'vat_number' => 'required|digits:15',
            'invoice_date' => 'required|date',
            'total_amount' => ['required', 'numeric', 'regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/'],
            'vat_amount' => ['required', 'numeric', 'regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/'],
            'qr_logo' => 'filled',
            'qr_options' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'seller_name.required' => 'Seller name is required.',
            'vat_number.required' => 'VAT number is required.',
            'vat_number.digits' => 'VAT number must be 15 digits.',
            'invoice_date.required' => 'Date and Time is required.',
            'invoice_date.date' => 'Date and Time should be a date.',
            'total_amount.required' => 'Total amount is required.',
            'total_amount.numeric' => 'Total amount must be a number.',
            'total_amount.regex' => 'Total amount must have 2 decimal places.',
            'vat_amount.required' => 'VAT amount is required.',
            'vat_amount.numeric' => 'VAT amount must be a number.',
            'vat_amount.regex' => 'VAT amount must have 2 decimal places.',
            'qr_options.required' => 'QR export type is required.',
        ];
    }
}
