<?php

namespace App\Http\Requests\User;

use App\Domain\Accounts\DTO\UserLoginData;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

    public function loginData()
    {
        return new UserLoginData([
            'email' => $this->input('email'),
            'password' => $this->input('password')
        ]);
    }
}
