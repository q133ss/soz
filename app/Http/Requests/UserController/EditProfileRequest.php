<?php

namespace App\Http\Requests\UserController;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class EditProfileRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'email|unique:users,email',
            'phone' => ['regex:/(8)[0-9]{10}/','unique:users,phone'],
            'old_password' => ['string','min:8', function ($attribute, $value, $fail)
            {
                $user = Auth()->user();
                if (
                    !$user
                    || !Hash::check($value, $user->password)
                ) {
                    abort(403,'Старый пароль неверный');
                }
            }],
            'new_password' => 'string|min:8',
            'verify_password' => ['string','min:8',function ($attribute, $value, $fail)
            {
                if($value != $this->new_password){
                    abort(403, 'Пароли не совпадают');
                }
            }],

            'is_executor' => 'boolean|nullable',
            'part_id' => 'nullable|integer',
            'experience' => 'nullable',
            'work_experience' => 'nullable',
            'education' => 'nullable',
            'training' => 'nullable'
        ];
    }
}
