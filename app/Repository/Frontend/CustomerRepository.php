<?php


namespace App\Repository\Frontend;
use App\Models\Customer as Model;
use Carbon\Carbon;

class CustomerRepository implements Contracts\CustomerRepositoryInterface
{
    protected $_model;

    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    public function save($request)
    {
        return $this->_model->create([
            'fullname' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'sex' => $request->gender ?? null,
            'avatar' => $request->avatar ?? null,
            'birth' => $request->birth ?? null,
            'address' => $request->address ?? null,
            'is_trash' => $request->is_trash ?? config('constant.account_active'),
        ]);
    }

    public function findOrFail($id) {
        return $this->_model->findOrFail($id);
    }

    public function update($id, $request)
    {
        $user = $this->_model->find($id);
        if ($request->password) {
            $user->password = $request->password;
        }

        $user->fullname = $request->name;
        $user->phone =  $request->phone;
        $user->sex = $request->gender ?? $user->sex;
        $user->avatar = $request->avatar ?? $user->avatar;

        return $user->save();
    }




}
