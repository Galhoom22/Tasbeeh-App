<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDhikrRequest extends FormRequest
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
            'text' => 'required|string|max:255|unique:dhikrs,text',
            'target_count' => 'required|integer|min:1|max:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => __('validation.dhikr_text_required'),
            'text.unique' => __('validation.dhikr_text_unique'),
            'target_count.required' => __('validation.target_count_required'),
            'target_count.min' => __('validation.target_count_min'),
            'target_count.max' => __('validation.target_count_max')
        ];
    }
}
