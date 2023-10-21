<?php


namespace App\Repository\Backend;

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
        return $this->_model->orderBy('order_no', 'ASC')->paginate($paginate, ['*'], 'np');
    }
    public function syncManagement($request)
    {
        try {
            $management = $this->save($request);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function syncManagementUpdate($request)
    {
        try {
            $management = $this->_model->find($request->id);
            $management1 = $this->update($request,$management);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function save($request)
    {
        return $this->_model->create([
            'name_vi' => $request->name_vi,
            'name_en' => $request->name_en ?? null,
            'position_vi' => $request->position_vi ?? null,
            'position_en' => $request->position_en ?? null,
            'order_no' => $request->order_no ?? 1,
            'avatar' => $request->path_file_name ?? null,
        ]);
    }
    public function update($request, $management)
    {
        $arrUpdate = [
            'name_vi' => $request->name_vi,
            'name_en' => $request->name_en ?? $management->name_en,
            'position_vi' => $request->position_vi ?? $management->position_vi,
            'position_en' => $request->position_en ?? null,
            'order_no' => $request->order_no ?? $management->order_no,
            'avatar' => $request->path_file_name ?? $management->avatar,
        ];
        return $this->_model
            ->where('id', $management->id)
            ->update($arrUpdate);
    }
    public function getDetailManagement($id)
    {
        return $this->_model->find($id);
    }
    public function syncDelete($id)
    {
        $management = $this->_model->find($id);
        try {
            $deletedRows = $this->_model->where('id', $id)->delete();
            if ($deletedRows>0){
                return $management->image;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
