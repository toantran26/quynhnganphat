<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BackendServices\CategoriesService as Service;

class CategoryController extends Controller
{
  protected $_service;

  public function __construct(Service $service)
  {
    $this->_service = $service;
  }

  public function index(Request $request)
  {
    return $this->_service->listCategory($request);
  }

  public function create(Request $request)
  {
    $request->validate([
      'title_vi' => 'required||string|max:255',
      'slug' => 'required||string|max:255',
    ]);

    return $this->_service->create($request);
  }
  public function edit($id)
  {
    $data = $this->_service->getFormUpdate($id);
    // dd($data);
    return view('backend.category.update', compact('data'));
  }
  public function postEdit(Request $request)
  {
    // dd('123123');
    $request->validate([
      'title_vi' => 'required||string|max:255',
      'slug' => 'required||string|max:255',
    ]);
    if ($this->_service->updateCategory($request)) {
      return redirect()->route('cate-list', $request->status)->with(['success' => 'Sửa chuyên mục thành công!']);
    }
  }
  public function delete($id)
  {
    // dd($this->_service->delete($id));
    if ($this->_service->delete($id)) {
      return redirect()->route('cate-list')->with(['success' => 'Xóa chuyên mục thành công!']);
    } else {
      return redirect()->route('cate-list')->with(['error' => 'Xóa chuyên mục thất bại!']);
    }
  }
}
