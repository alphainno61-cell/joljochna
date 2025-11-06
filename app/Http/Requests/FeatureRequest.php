<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',

        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'শিরোনাম আবশ্যক।',
            'title.max' => 'শিরোনাম সর্বাধিক ২৫৫ অক্ষর হতে হবে।',
            'description.required' => 'বিবরণ আবশ্যক।',
            'description.max' => 'বিবরণ সর্বাধিক ১০০০ অক্ষর হতে হবে।',
            'icon.max' => 'আইকন সর্বাধিক ২৫৫ অক্ষর হতে হবে।',
        ];
    }
}
