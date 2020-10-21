<?php
namespace Domain\Auth;

use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Domain\Http\ResponseFactory;

class AuthService
{
    protected $response;
    public function __construct(ResponseFactory $response) {
        $this->response = $response;
    }
    public function byCredentials(array $credentials, $type = null)
    {
        $email = array_get($credentials, 'username');
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $email;
            unset($credentials['username']);
        }
        if(isset($type)){ $credentials['usuario_type'] = $type;}
        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->response->make(['error' => 'invalid_credentials'],401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->response->make(['error' => 'could_not_create_token '.$e->getMessage()],500);
        }
        return $this->getUser($token);
    }

    public function getTokenUser($usuario){
        return JWTAuth::fromUser($usuario);
    }
    
    public function autenticacao(array $credentials, $type)
    {
        $email = array_get($credentials, 'username');
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $email;
            unset($credentials['username']);
        }
        $credentials['usuario_type'] = $type;
        if(Auth::attempt($credentials)){
            return true;
        } 
        return false;
    }

    /**
     * @param Authenticatable $user
     * @param bool            $remember
     *
     * @return  array
     */
    public function login(Authenticatable $user, $remember = false)
    {
        $token = JWTAuth::fromUser($user);
        $user->load('usuario');

        return compact('token', 'user');
    }

    /**
     * @return bool
     */
    public function logout($token = null)
    {
        if (is_null($token)) {
            return JWTAuth::invalidate(JWTAuth::getToken());
        }

        return JWTAuth::invalidate($token);
    }

    /**
     * Get user authenticate.
     *
     * @param  string $token
     * @return array
     */
    private function getUser($token)
    {
        $user = Auth::User();
        $user->load('usuario');
        return compact('token', 'user');
    }
}
