<?php


namespace App\Repository\Backend;

use App\Models\Client;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class ClientRepository implements Contracts\ClientRepositoryInterface
{
    protected $_model;

    public function __construct(Client $model)
    {
        $this->_model = $model;
    }

    public function getAllAccount()
    {
        return $this->_model->select('id', 'name_vi','name_en')->get();
    }

    public function getAllClient($paginate = 5, $keyword = '')
    {
        $listClient = $this->_model;
        if ($keyword != '') {
            $listClient = $listClient->where('name_vi', 'like','%'.$keyword.'%');
        
        }
        // dd($listClient->paginate($paginate, ['*'], 'np'));
        return $listClient->paginate($paginate, ['*'], 'np');
    }
    public function syncClient($request)
    {
        try {
            $client = $this->save($request);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function syncClientUpdate($request)
    {
        try {
            $client = $this->_model->find($request->id);
            $client1 = $this->update($request,$client);
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
            'width' => $request->width ?? null,
            'height' => $request->height ?? null,
            'link' => $request->link ?? null,
            'avatar' => $request->path_file_name ?? null,
        ]);
    }
    public function update($request, $client)
    {
        $arrUpdate = [
            'name_vi' => $request->name_vi,
            'name_en' => $request->name_en ?? null,
            'width' => $request->width ?? null,
            'height' => $request->height ?? null,
            'link' => $request->link ?? $client->link,
            'avatar' => $request->path_file_name ?? $client->avatar,
        ];
        return $this->_model
            ->where('id', $client->id)
            ->update($arrUpdate);
    }
    public function getDetailClient($id)
    {
        return $this->_model->find($id);
    }
    public function syncDelete($id)
    {
        $client = $this->_model->find($id);
        try {
            $deletedRows = $this->_model->where('id', $id)->delete();
            if ($deletedRows>0){
                return $client->avatar;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
