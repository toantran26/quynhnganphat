<?php

namespace App\Services\BackendServices;

use App\Repository\Backend\Contracts\ManagementRepositoryInterface as Model;
use Illuminate\Http\Request;

class ManagementServices
{
    const path_file = 'uploads/managements';
    protected $_model;
    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    public function getAllManagementAccount($paginate, $keword)
    {
        return $this->_model->getAllManagement($paginate, $keword);
    }
    public function getFormAddManagement()
    {
        
        return true;
    }
    public function getFormUpdate($id) {
        $management = $this->_model->getDetailManagement($id);
        return ['management'=>$management];
    }
    public function storeManagement(Request $request){
        if($request->avatar) {
            $file = $request->avatar;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }
        return $this->_model->syncManagement($request);
    }
    public function updateAccount(Request $request){
        if($request->avatar) {
            $file = $request->avatar;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }
        return $this->_model->syncManagementUpdate($request);
    }
    public function delete($id){
        $delete = $this->_model->syncDelete($id);
        try {
            unlink(public_path($delete));
            return true;
        } catch (\Exception $e) {
            return true;
        }
    }
}
