<?php

namespace App\Services\FrontendServices;

use App\Repository\Frontend\Contracts\ManagementRepositoryInterface as Model;
use Illuminate\Http\Request;

class ManagementServices
{
    const path_file = 'uploads/managements';
    protected $_model;
    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    public function listAllManagement(){
        return $this->_model->getListAllManagement();
    }
    public function getAllManagementAccount($paginate, $keword)
    {
        return $this->_model->getAllManagement($paginate, $keword);
    }
    
}
