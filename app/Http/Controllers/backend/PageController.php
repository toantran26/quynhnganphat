<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Services\BackendServices\PageServices as Services;
use App\Services\BackendServices\AdminServices;

class PageController extends Controller
{
    protected $_service;
    protected $_user;

    public function __construct(Services $services , AdminServices $admin )
    {
        $this->_service = $services;
        $this->_user = $admin;
    }

    public function index(Request $request) {
        $listPage = $this->_service->listPage($request);
        $listUser = $this->_user->getListAllUser();
        $listPage->appends(request()->except('page'));
        $keyword = $request->keyword ?? "";
        $author_id = $request->author_id ?? "";


        return view('backend.page.index', compact(['listPage','listUser']));

    }

    public function create() {
        return view('backend.page.create');
    }

    public function storePage(Request $request) {

        $request->validate([
            'title_vi'=>'required|max:255',
            'content_vi' => 'required',
        ]);

        if($request->file('avatar')) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }
        
        if($this->_service->storePage($request)) {
            return redirect()->route('config-page')->with(['success' => 'Thêm trang tĩnh thành công!']);
        }
        return back()->with(['error' => 'Đã có lỗi xảy ra!']);
        
    }

    public function editPage($id) {
        // $data = $this->_service->getFormUpdate($id);
        $onePage = $this->_service->getDetailPage($id);
        // dd($onePage);
        return view('backend.page.update', compact('onePage'));
    }

    public function update(Request $request) {
        $request->validate([
            'title_vi'=>'required|max:255',
            'content_vi' => 'required',
        ]);

        if($request->file('avatar')) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        if($this->_service->update($request)) {

            return redirect()->route('config-page')->with(['success' => 'Cập nhật thành công!']);
        }

        return back()->with(['error' => 'Đã có lỗi xảy ra!']);
    }
    public function delete($id){
        if($this->_service->postTrash($id)) {
            return redirect()->route('config-page', config('constant.post_remove'))->with(['success' => 'Bài đã được gỡ thành công !!']);
        }
        return back()->with(['error' => 'Đã có lỗi xảy ra!']);
    }
}