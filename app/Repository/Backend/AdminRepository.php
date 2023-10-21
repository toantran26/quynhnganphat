<?php


namespace App\Repository\Backend;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class AdminRepository implements Contracts\AdminRepositoryInterface
{
    protected $_model;

    public function __construct(User $model)
    {
        $this->_model = $model;
    }

    public function getAllAccount()
    {
        return $this->_model->select('id', 'name')->get();
    }

    public function getAllUser($paginate = 5, $keyword = '')
    {
        if ($keyword != '') {
            $this->_model = $this->_model->where('name', 'like','%'.$keyword.'%')->where('username', 'like','%'.$keyword.'%');
        
        }
        // dd($this->_model->paginate($paginate, ['*'], 'np'));
        return $this->_model->paginate($paginate, ['*'], 'np');
    }
    public function getListAllUser()
    {
        return $this->_model->get();
    }
    public function syncAdmin($request)
    {
        try {
            $user = $this->save($request);
            $user->assignRole($request->role);
            if(!$request->permission){
                $user->givePermissionTo($request->permission);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function syncAdminUpdate($request)
    {
        try {
            
            $user = $this->_model->find($request->id);
            $user1 = $this->update($request,$user);
            if($user1){
                $user->roles()->detach();
                if($request->role){
                    $user->assignRole($request->role);
                }
                
            }
            if(!$request->permission){
                $user->givePermissionTo();
                $user->givePermissionTo($request->permission);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function save($request)
    {
        return $this->_model->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => $request->path_file_name ?? null,
        ]);
    }
    public function update($request, $user)
    {
        if($request->password){
            $arrUpdate = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $request->path_file_name ?? $user->avatar,
                'password' => $request->password
            ];
        }else{
            $arrUpdate = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $request->path_file_name ?? $user->avatar,
            ];
        }
        return $this->_model
            ->where('id', $user->id)
            ->update($arrUpdate);
    }
    public function getDetailUser($id)
    {
        return $this->_model->find($id);
    }
}
