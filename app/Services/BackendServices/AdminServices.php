<?php


namespace App\Services\BackendServices;

use App\Repository\Backend\Contracts\AdminRepositoryInterface as Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminServices
{
    const path_file = 'uploads/user';
    protected $__model;
    protected $_permission;
    protected $_role;
    public function __construct(Model $model, Permission $_permission, Role $_role)
    {
        $this->__model = $model;
        $this->_permission = $_permission;
        $this->_role = $_role;
    }

    public function getAllAdminAccount($paginate, $keword)
    {
        return $this->__model->getAllUser($paginate, $keword);
    }
    public function getListAllUser(){
        return $this->__model->getListAllUser();
    }
    public function getFormAddAdmin()
    {
        $list_permisson = $this->_permission->get();
        $list_role =  $this->_role->get();

        return ['list_permisson' => $list_permisson, 'list_role' => $list_role];
    }
    public function getFormUpdate($id) {
        $user = $this->__model->getDetailUser($id);
        $list_role =  $this->_role->get();
        return ['list_role'=>$list_role,'user'=>$user];
    }
    public function storeAccount(Request $request){
        if($request->avatar) {
            $file = $request->avatar;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }

        // if($request->role) {
        //     var_dump($request->role);
        // }
        if($request->password) {
            $request->password = Hash::make($request->password);
        }
        return $this->__model->syncAdmin($request);
    }
    public function updateAccount(Request $request){
        if($request->avatar) {
            $file = $request->avatar;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }

        // if($request->role) {
        //     var_dump($request->role);
        // }
        if($request->password) {
            $request->password = Hash::make($request->password);
        }
        return $this->__model->syncAdminUpdate($request);
    }
    
}
