<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'integer', 'min:1', 'max:65535'],
            'hourly_price' => ['required', 'integer', 'min:1', 'max:65535'],
        ];
    }
}
