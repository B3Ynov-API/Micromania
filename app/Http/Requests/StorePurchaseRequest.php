<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
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
            'product_quantities' => 'required|array',
            'product_quantities.*' => 'required|integer|min:0',
            'product_ids' => 'required|array',
            'product_ids.*' => 'required|integer|exists:products,id',
        ];
    }
}
