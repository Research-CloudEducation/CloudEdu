<?php

namespace App\Http\Requests\ClassLevel;

use Illuminate\Foundation\Http\FormRequest;

class ClassLevelUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => ['required' , 'string'],
            'description_ar' => ['required' , 'string'],
        ];
    }
}
