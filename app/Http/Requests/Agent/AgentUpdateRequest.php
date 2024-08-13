<?php

namespace App\Http\Requests\Agent;

use App\Models\Agent;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class AgentUpdateRequest extends FormRequest
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Agent::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'address'  => 'required',
            'school_id' => 'required',
            'phone'  =>  ['required' , 'numeric']
        ];
    }
}
