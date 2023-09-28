<?php

namespace App\Modules\User\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'data.name' => ['required', 'string'],
            'data.surname' => ['required', 'string'],
            'data.date' => ['required', 'date'],
            'data.photo' => ['required', 'string'],
            'data.phone' => ['required', 'string'],
            'data.phone_verified_at' => ['nullable'],
            'data.email' => ['required', 'email'],
            'data.email_verified_at' => ['nullable'],
            'data.country_id' => ['nullable'],
            'data.password' => ['required'],
            'roles' => ['required', 'array'],
            'roles.*.role_code' => ['required', 'string'],
            'roles.*.status' => ['required', 'boolean'],
        ];
    }
}
