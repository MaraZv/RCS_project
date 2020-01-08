<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'recipient' => 'required|min:5|max:30',
            'description' =>'required|min:5|max:50',
            'amount' => 'required|between:0,6999,99',
        ];
    }

    public function messages()
    {
        return [
            'recipient.required' => 'This field is required',
            'description.required'  => 'This field is required',
            'amount.required' => 'This field is required',
        ];
    }
}
