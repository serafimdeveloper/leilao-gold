<?php
/**
 * @Author: Leandro Henrique Reis <emtudo@gmail.com>
 * @Date:   2016-05-07 08:40:48
 * @Last Modified by:   Leandro Henrique Reis
 * @Last Modified time: 2016-06-04 19:51:16
 */

namespace Domain\Auth;

use Auth;
use Domain\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    protected $auth;

    /**
     * Construct.
     * @param AuthService $auth
     */
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(AuthRequest $request)
    {
        $data = $request->only(['username', 'password']);
        $type = "Domain\\Administrador\\Administrador";
        $remember = $request->get('remember');

        if($this->auth->autenticacao($data, $type)){
            return redirect()->route('/admin');
        }
        return view('auth.login')->with(['errors'=>'Usuarios ou senha inválidas'])->withInput();
    }

    public function logout()
    {
        if ($this->auth->logout()) {
            return response(['logout' => true]);
        }

        return response(['logout' => false]);
    }
}
