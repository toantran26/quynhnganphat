<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;
use App\Services\BackendServices\JobsServices as Services;



class JobsController extends Controller
{
  protected $_service;

  public function __construct(Services $services)
  {
    $this->_service = $services;
  }

  public function index($status, Request $request)
  {

    $listJobs = $this->_service->listJobs($status, $request);
    return view('backend.job.index', compact(['listJobs']));
  }
  public function createJobs()
  {

    $data = $this->_service->getFormAddJobs();
    return view('backend.job.create', compact('data'));
  }
  public function create(Request $request)
  {
    $request->validate([
      'title_vi' => 'required|max:255',
      'content_vi' => 'required',
      'slug' => 'required|max:255',
      'amount' => 'required|integer'
    ]);


    if ($request->file('avatar')) {
      $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
      ]);
    }
    if ($request->file('icon_avatar')) {
      $request->validate([
        'icon_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
      ]);
    }

    if ($this->_service->storeJobs($request)) {
      return redirect()->route('list-jobs', $request->status)->with(['success' => 'Thêm bài tuyển dụng thành công!']);
    }
    return back()->with(['error' => 'Đã có lỗi xảy ra!']);
  }
  public function editJobs($slug, $id)
  {
    $data = $this->_service->getFormUpdate($slug, $id);

    return view('backend.job.update', compact('data'));
  }

  public function update(Request $request)
  {
    $request->validate([
      'title_vi' => 'required|max:255',
      'content_vi' => 'required',
      'slug' => 'required|max:255',
      'amount' => 'required|integer'
    ]);

    if ($request->file('avatar')) {
      $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);
    }
    if ($request->file('icon_avatar')) {
      $request->validate([
        'icon_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
      ]);
    }
    if ($this->_service->update($request)) {

      return redirect()->route('list-jobs', $request->status)->with(['success' => 'Cập nhật thành công!']);
    }

    return back()->with(['error' => 'Đã có lỗi xảy ra!']);
  }
  public function delete($id)
  {
    if ($this->_service->postTrash($id)) {
      return back()->with(['success' => 'Bài đã được gỡ thành công !!']);
    }
    return back()->with(['error' => 'Đã có lỗi xảy ra!']);
  }
}
