<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterProductRequest extends FormRequest
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
            'searchName' => 'nullable|string',
            'searchPriceMin' => 'nullable|numeric',
            'searchPriceMax' => 'nullable|numeric',
            'searchCategory' => 'nullable|numeric',
            'searchPegi' => 'nullable|numeric',
            'searchGenre' => 'nullable|numeric',
        ];
    }
}
