<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
        return [
            'title' => ['required'],
            'author' => ['required'],
            'pageLength' => ['required'],
            'publicDate' => ['required']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'page_length' => $this->pageLength,
            'public_date' => $this->publicDate
        ]);
    }
}
