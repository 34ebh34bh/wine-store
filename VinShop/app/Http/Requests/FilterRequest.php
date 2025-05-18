<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => 'nullable|string',
            "from_price" => 'nullable|integer',
            "to_price"  => 'nullable|integer',
            "year" => 'nullable|integer',
            "volume"  => 'nullable|integer',
            "color"  => 'nullable|string',
            "Fortress"  => 'nullable|string',
            "Region" => 'nullable|string',
            ];
    }
}
