<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class TeacherCreateRequest extends FormRequest
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Teacher::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address'  => 'required',
            'school_id' => 'required',
            'phone'  =>  ['required' , 'numeric']
        ];
    }
}
