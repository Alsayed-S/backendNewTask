<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:category_translations,name,'.$this->id,
            'details' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The category name is required.',
            'name.max' => 'The category name should not exceed 255 characters.',
            'name.unique' => 'The category name has already been taken.',

        ];
    }
}
