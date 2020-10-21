<?php
/**
 * @Author: Leandro Henrique Reis <emtudo@gmail.com>
 * @Date:   2016-05-05 08:41:02
 * @Last Modified by:   Leandro Henrique Reis
 * @Last Modified time: 2016-06-04 19:51:55
 */

namespace Domain\Cliente\Http\Request;

use Domain\Http\Requests\Request;

class StoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:30|unique:usuarios',
            'email'=>'required|max:255|email|unique:usuarios',
            'password' => 'required|min:8|max:30|confirmed'
        ];
    }
    
    public function messages() {
        return [
            'nome.required'=>'O nome é obrigatório',
            'nome.min'=>'O nome deve conter pelo menos 3 caracteres',
            'nome.max'=>'O nome deve conter no máximo 255 caracteres',
            'username.required'=>'O usuário é obrigatório',
            'username.min'=>'O usuário deve conter pelo menos 3 caracteres',
            'username.max'=>'O usuário deve conter no máximo 30 caracteres',
            'username.unique'=>'O usuário já existe',
            'email.required'=>'O email é obrigatório',
            'email.email'=>' O Email inválido',
            'email.unique'=>'O Email já existe',
            'email.max'=>'O Email deve conter no máximo 255 caracteres',
            'password.required'=>'A senha e obrigatório',
            'password.min'=>'A senha deve conter no mínimo 8 caracteres',
            'password.max'=>'A senha deve conter no máximo 30 caracteres',
            'password.confirmed'=>'A senhas não correspondem'            
        ];
    }
}
