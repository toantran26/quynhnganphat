<?php

namespace App\Services\BackendServices;

use App\Repository\Backend\Contracts\ContactRepositoryInterface as Model;
use Illuminate\Http\Request;

class ContactServices
{
    const path_file = 'uploads/contacts';
    protected $_model;
    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    public function getAllContactAccount($paginate, $keword)
    {
        return $this->_model->getAllContact($paginate, $keword);
    }
    public function getFormAddContact()
    {
        
        return true;
    }
    public function getFormUpdate($id) {
        $management = $this->_model->getDetailContact($id);
        return ['management'=>$management];
    }
    public function storeContact(Request $request){
        if($request->avatar) {
            $file = $request->avatar;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }
        return $this->_model->syncContact($request);
    }
    public function mailNoti(Request $request){
        return $this->_model->syncMailNoti($request);
    }
    public function updateAccount(Request $request){
        if($request->avatar) {
            $file = $request->avatar;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }
        return $this->_model->syncContactUpdate($request);
    }
    
}
