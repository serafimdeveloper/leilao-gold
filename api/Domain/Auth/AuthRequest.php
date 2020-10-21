<?php

namespace Domain\Auth;

use Domain\Http\Requests\Request;

class AuthRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required|min:6',
            'remember' => 'boolean',
        ];
    }
}
