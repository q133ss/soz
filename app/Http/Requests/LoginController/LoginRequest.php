<?php

namespace App\Http\Requests\LoginController;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
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
            'phone' => ['required',
                        function ($attribute, $value, $fail) {
                            if (!User::where('phone', $value)->exists()) {
                                abort(403, __('Пользователь с таким телефоном не найден'));
                            }
                        }
                       ],
            'password' => [ 'required',
                            'string',
                            function ($attribute, $value, $fail)
                            {
                                $user = User::where('phone', $this->phone)->first();
                                if (
                                    !$user
                                    || !Hash::check($value, $user->password)
                                ) {
                                    abort(403, __('Неверный пароль'));
                                }
                            }
                          ]
        ];
    }
}
