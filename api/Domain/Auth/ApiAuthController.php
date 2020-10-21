<?php

namespace Domain\Auth;

use Illuminate\Http\Request;
use Domain\Http\Controllers\Controller;

class ApiAuthController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth) {
        $this->auth = $auth;
    }
    
    public function userAuth(Request $request){
        $credentials = $request->only('username','password');
        return  $this->auth->byCredentials($credentials);
    }    
}
