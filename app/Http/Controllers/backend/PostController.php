<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\BackendServices\PostServices as Services;
use App\Services\BackendServices\CategoriesService;
use App\Services\BackendServices\AdminServices;
use App\Services\BackendServices\PostEditServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class PostController extends Controller
{
    protected $_service;
    protected $_category;
    protected $_user;
    protected $_edit;

    public function __construct(Services $services , CategoriesService $category, AdminServices $admin,PostEditServices $post_edit )
    {
        $this->_service = $services;
        $this->_category = $category;
        $this->_user = $admin;
        $this->_edit = $post_edit;
    }

    public function index($status ,Request $request) {
        

        $listPost = $this->_service->listBlog($status,$request);

        $listCategory = $this->_category->getAllCategories();
        // foreach($listPost as $key => $value){
        //     $value = $value->toArray();
        //     unset($value['id']);
        //     // // dd($value);
        //     Post::create($value);
        // }
        $listUser = $this->_user->getListAllUser();
        // $listPost->appends(request()->except('page'));
        $listPost->appends(request()->except('page'));
        $keyword = $request->keyword ?? "";
        $category_id = $request->category_id ?? "";
        $user_id = $request->user_id ?? "";


        return view('backend.post.index', compact(['listPost', 'status','listCategory','listUser']));

    }

    public function create(Request $request) {
        // dd($request->all());
        $request->validate([
            'title_vi'=>'required|max:255',
            'content_vi' => 'required',
            'cate_id' =>'required|numeric|exists:categories,id',
            'slug' => 'required|max:255',
        ]);

        if($request->file('avatar')) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
        // dd('1212121');
        
        if($this->_service->storeBlog($request)) {
            return redirect()->route('list-post', $request->status)->with(['success' => 'Thêm bài viết thành công!']);
        }
        return back()->with(['error' => 'Đã có lỗi xảy ra!']);
    }

    public function createPost() {
        $data = $this->_service->getFormAddPost();
        return view('backend.post.create-blog', compact('data'));
    }

    public function editPost($slug, $id) {
        $data = $this->_service->getFormUpdate($slug,$id);
        $editing = $this->_edit->getEditByPost($id);
        $user_id = Auth::user()->id;
        if($editing){
            if($editing->time < strtotime(Carbon::now()->subMinutes(2)) || ($user_id == $editing->user_id )){
                $this->_edit->update($user_id,$id);
                $editing = null;
            }
            $this->_edit->updateTime($id);
        }else{
            $dataEdit['post_id'] = $id;
            $dataEdit['user_id'] = $user_id;
            $checkEdit = $this->_edit->create($dataEdit);
        }

        return view('backend.post.update', compact('data','editing'));
    }

    public function update(Request $request) {
        $request->validate([
            'title_vi'=>'required|max:255',
            'content_vi' => 'required',
            'cate_id' =>'required|numeric|exists:categories,id',
        ]);

        if($request->file('avatar')) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
        $editing = $this->_edit->getEditByPost($request->id);
        $user_id = Auth::user()->id;
        if($user_id != $editing->user_id ) die('Vui lòng load lại để cập nhật dữ liệu mới nhất');
        if($this->_service->update($request)) {
            return redirect()->route('list-post', $request->status)->with(['success' => 'Cập nhật thành công!']);
        }
        return back()->with(['error' => 'Đã có lỗi xảy ra!']);
    }
    public function delete($id){
        if($this->_service->postTrash($id)) {
            return back()->with(['success' => 'Bài đã được gỡ thành công !!']);
        }
        return back()->with(['error' => 'Đã có lỗi xảy ra!']);
    }

    public function updatePostEdit(Request $request){
        $post_id  = $request->post_id;
        return $this->_edit->updateTime($post_id);
    }
}