<?php


namespace App\Repository\Backend;

use App\Models\Contact;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class ContactRepository implements Contracts\ContactRepositoryInterface
{
    protected $_model;

    public function __construct(Contact $model)
    {
        $this->_model = $model;
    }

    public function getAllAccount()
    {
        return $this->_model->get();
    }

    public function getAllContact($paginate = 5, $keyword = '')
    {
        if ($keyword != '') {
            $this->_model = $this->_model->where('email', 'like','%'.$keyword.'%');
        }
        // dd($this->_model->paginate($paginate, ['*'], 'np'));
        return $this->_model->orderBy('id', 'DESC')->paginate($paginate, ['*'], 'np');
    }
    public function syncContact($request)
    {
        try {
            $Contact = $this->save($request);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function syncMailNoti($request){
        try {
            return $this->_model->create([
                'email' => $request->email ?? null,
                'noti' => 1,
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }
    public function syncContactUpdate($request)
    {
        try {
            $Contact = $this->_model->find($request->id);
            $Contact1 = $this->update($request,$Contact);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function save($request)
    {
        return $this->_model->create([
            'fullname' => $request->fullname,
            'email' => $request->email ?? null,
            'phone' => $request->phone ?? null,
            'is_trash' => $request->is_trash ?? 0,
            'title' => $request->title ?? null,
            'content' => $request->content ?? null,
            'address' => $request->address ?? null,
            'advise' => $request->advise ?? null,
            
        ]);
    }
    public function update($request, $Contact)
    {
        $arrUpdate = [
            'fullname' => $request->fullname,
            'email' => $request->email ?? $Contact->email,
            'phone' => $request->phone ?? $Contact->phone,
            'is_trash' => $request->is_trash ?? $Contact->is_trash,
            'title' => $request->title ?? $Contact->title,
            'content' => $request->content ?? $Contact->content,
            'address' => $request->address ?? $Contact->address,
            'advise' => $request->advise ?? $Contact->advise,
            
        ];
        return $this->_model
            ->where('id', $Contact->id)
            ->update($arrUpdate);
    }
    public function getDetailContact($id)
    {
        return $this->_model->find($id);
    }
    public function syncDelete($id)
    {
        $Contact = $this->_model->find($id);
        try {
            $deletedRows = $this->_model->where('id', $id)->delete();
        } catch (\Exception $e) {
            return false;
        }
    }
}
