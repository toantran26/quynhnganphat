<?php

namespace App\Services\BackendServices;

use App\Repository\Backend\Contracts\ClientRepositoryInterface as Model;
use Illuminate\Http\Request;

class ClientServices
{
    const path_file = 'uploads/clients';
    protected $_model;
    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    public function getAllClientAccount($paginate, $keword)
    {
        return $this->_model->getAllClient($paginate, $keword);
    }
    public function getFormAddClient()
    {
        
        return true;
    }
    public function getFormUpdate($id) {
        $client = $this->_model->getDetailClient($id);
        return ['client'=>$client];
    }
    public function storeClient(Request $request){
        if($request->avatar) {
            $file = $request->avatar;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }
        return $this->_model->syncClient($request);
    }
    public function updateAccount(Request $request){
        if($request->avatar) {
            $file = $request->avatar;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }
        return $this->_model->syncClientUpdate($request);
    }
    public function delete($id){
        $delete = $this->_model->syncDelete($id);
        if($delete !=null) unlink(public_path($delete));
        return true;
    }
    
}
