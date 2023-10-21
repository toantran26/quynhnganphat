<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $_mode;
    protected $_permission;

    public function __construct(Role $mode, Permission $permission)
    {
        $this->_mode = $mode;
        $this->_permission = $permission;
    }

    public function index(Request $request)
    {
        $list_role = $this->_mode->get();
        return view('backend.role.index')->with(compact('list_role'));
    }
    public function create()
    {
        $data = $this->_permission->get();

        return view('backend.role.create-role', compact('data'));
    }
    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'permission' => 'required',
        ]);
        $role = $this->_mode::create(['name' => $request->name]);
        if ($role) {
            $role->givePermissionTo($request->permission);
            return redirect()->route('list-role', $request->status)->with(['success' => 'Thêm phân quyền thành công!']);
        }
        return back()->with(['error' => 'Đã có lỗi xảy ra!']);
    }
}
