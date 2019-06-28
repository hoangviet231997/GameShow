<?php

namespace Modules\NewGameShow\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\NewGameShow\Entities\User;
use Modules\NewGameShow\Http\Requests\LoginRequest;
use Modules\NewGameShow\Http\Requests\RegisterRequest;
use Tymon\JWTAuth\JWTAuth;

class UserController extends BaseController
{
    public function register(RegisterRequest $request)
    {
        $dataInput = $request->only('name','email','password','phone');
        $dataInput['password']=bcrypt($dataInput['password']);
        $register = User::create($dataInput);
        return $this->responseSuccess($register,'Register success!');
    }

    public function login(LoginRequest $request)
    {
        $dataInput = $request->only('email', 'password');
        if($login = Auth::attempt($dataInput))
        {
            return $this->responseSuccess($login,'Login Success');
        }
        return $this->responseBadRequest('Login Fail');
    }

    public function logout() {
        $logout=Auth::logout();
        return $this->responseSuccess(null,'Logout success!');
    }

    public function me(Request $request) {
        $me= Auth::user();
        if(!$me){
            return $this->responseSuccess(null,'Fail!');
        }
        return $this->responseSuccess($me,'success!');

    }


}
