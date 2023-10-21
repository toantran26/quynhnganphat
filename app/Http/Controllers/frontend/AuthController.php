<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\UserServices as Services;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    protected $_service;

    public function __construct(Services $service)
    {
        $this->_service = $service;
    }

    /**
     * Login Using Facebook
     */
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $this->_service->loginByFaceBook();
            return redirect()->route('home');
        } catch (\Throwable $th) {
            abort(401);
        }
    }

    public function register(Request $request) {
        $request->validate([
            'user_name_register' =>'required||string|max:100',
            'password_register' =>'required||string|min:5|max:25|confirmed',
            'email' =>'required||email|unique:users,email',
        ]);

        if($this->_service->register($request)) {
            return redirect()->back()->with(['success_register' =>'Tạo tài khoản thành công!']);
        }

        return redirect()->back()->with(['error_register' =>'Đã có lỗi xảy ra!']);

    }
}
