<?php


namespace App\Services\FrontendServices;

use App\Repository\Frontend\Contracts\CustomerRepositoryInterface as Model;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Illuminate\Validation\ValidationException;

class AuthServices
{
    protected $_model;
    const path_file = 'upload/images';

    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    public function register($request)
    {
        $request->password = Hash::make($request->password_register);
        $request->name = $request->user_name_register;
        $request->email = $request->email_register;
        $request->phone = $request->phone_register;

        try {
            $saveUser = $this->_model->save($request);
            event(new Registered($saveUser));
            return Auth::guard('web')->loginUsingId($saveUser->id);
        } catch (Throwable $th) {
            return false;
        }
    }

    public function registerHome($request)
    {
        $request->password = Hash::make($request->password_home);
        $request->name = $request->full_name_home;
        $request->email = $request->email_home;
        $request->phone = $request->phone_home;

        try {
            $saveUser = $this->_model->save($request);
            event(new Registered($saveUser));
            return Auth::guard('web')->loginUsingId($saveUser->id);
        } catch (Throwable $th) {
            return false;
        }
    }

    public function loginUserWeb($request)
    {
        return Auth::guard('web')->attempt(
            $request->only('email', 'password'),
            $request->boolean('remember')
        );
    }

    public function update($id, $request)
    {

        if ($request->password_update_old) {
            $user = $this->_model->findOrFail($id);
            if (!Hash::check($request->password_update_old, $user->password)) {
                throw ValidationException::withMessages([
                    'password_update_old' => ['Mật khẩu cũ không chính xác !'],
                ]);
            }

            if (Hash::check($request->password_update, $user->password)) {
                throw ValidationException::withMessages([
                    'password_update' => ['Mật khẩu mới đã được sử dụng!'],
                ]);
            }
        }
        if ($request->file('avatar')) {
            $file = $request->avatar;
            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->avatar = '/' . self::path_file . '/' . $fileName;
        }

        if ($request->user_name_update) {
            $request->name = $request->user_name_update;
        }

        if ($request->password_update) {
            $request->password = $request->password_update;
        }

        if ($request->password) {
            $request->password = Hash::make($request->password);
        }

        return $this->_model->update($id, $request);
    }

}
