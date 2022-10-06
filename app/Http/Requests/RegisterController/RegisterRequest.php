<?php

namespace App\Http\Requests\RegisterController;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/(8)[0-9]{10}/|unique:users,phone',
            'password' => 'required|string|min:8',

            'is_executor' => 'boolean|nullable',
            'part_id' => 'nullable|integer',
            'experience' => 'nullable',
            'work_experience' => 'nullable',
            'education' => 'nullable',
            'training' => 'nullable'
        ];
    }
}
