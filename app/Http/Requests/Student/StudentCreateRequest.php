<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'name_ar' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Student::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address'  => 'required',
            'phone'  =>  ['required' , 'numeric'],
            'school_id' => 'required',
            'class_id' => 'required',
        ];
    }
}
