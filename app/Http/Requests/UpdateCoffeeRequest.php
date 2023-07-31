<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoffeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                "title" => ['required'],
                "price" => ['required'],
                "available" => ['required'],
                "sold" => ['required']
            ];
        } else {
            return [
                "title" => ['sometimes', 'required'],
                "price" => ['sometimes', 'required'],
                "available" => ['sometimes', 'required'],
                "sold" => ['sometimes', 'required']
            ];
        }
    }
}
