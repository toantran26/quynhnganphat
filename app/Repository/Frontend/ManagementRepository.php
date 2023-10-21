<?php


namespace App\Repository\Frontend;

use App\Models\Management;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class ManagementRepository implements Contracts\ManagementRepositoryInterface
{
    protected $_model;

    public function __construct(Management $model)
    {
        $this->_model = $model;
    }

    public function getListAllManagement(){
        return $this->_model->orderBy('order_no', 'ASC')->get();
    }
    public function getAllAccount()
    {
        return $this->_model->select('id', 'name_vi')->get();
    }

    public function getAllManagement($paginate = 5, $keyword = '')
    {
        if ($keyword != '') {
            $this->_model = $this->_model->where('name_vi', 'like','%'.$keyword.'%');
        
        }
        // dd($this->_model->paginate($paginate, ['*'], 'np'));
        return $this->_model->paginate($paginate, ['*'], 'np');
    }
    
    public function getDetailManagement($id)
    {
        return $this->_model->find($id);
    }
}
