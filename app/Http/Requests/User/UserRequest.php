<?php

namespace App\Http\Requests\User;

use App\Domain\Accounts\DTO\UserData;
use App\Domain\Accounts\Enums\UserRole;
use App\Domain\Accounts\Models\User;
use App\Domain\Accounts\Policies\UserAuthPolicy;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $method = strtolower($this->method());

        if ($method === 'post') {
            $this->user()->can(UserAuthPolicy::CREATE, [User::class]);
        }

        if ($method === 'patch') {
            $this->user()->can(UserAuthPolicy::UPDATE, $this->user());
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'role' => 'required|string'
        ];
    }

    public function userData(): UserData
    {
        return new UserData([
            'first_name' => $this->input('first_name'),
            'last_name' => $this->input('last_name'),
            'email' => $this->input('email'),
            'phoneNumber' => $this->input('phone_number'),
            'password' => $this->input('password'),
            'role' => new UserRole($this->input('role'))
        ]);
    }
}
