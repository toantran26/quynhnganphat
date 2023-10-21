<?php

    namespace App\Http\Controllers\backend;

    use App\Http\Controllers\Controller;
    use App\Models\Banner;
    use App\Services\BackendServices\BannerServices;
    use Illuminate\Http\Request;

    class BannerController extends Controller
    {
        protected $__services;

        public function __construct(BannerServices $services)
        {
            $this->__services = $services;
        }

        public function index($is_page, Request $request)
        {
            $keyWord = $request->input('keyword') ?? '';
            if($request->input('order_no')){
                if($request->input('order_no')) foreach($request->input('order_no') as $key=>$val) 
                Banner::where('id' ,$key)->update(array('order_no'=>$val));
            }
            $banner = $this->__services->getAllBanner($is_page,10, $keyWord);
            
            return view('backend.banner.index')->with(compact('banner','banner'));
        }
        public function create() {
            $data = $this->__services->getFormAddBanner();
            
            return view('backend.banner.create', compact('data'));
        }
        public function createBanner(Request $request) {
            // $request->validate([
            //     'name'=>'required|max:255',
            //     'username' => 'required',
            //     'email' =>'required',
            // ]);
    
            // if($request->file('image')) {
            //     $request->validate([
            //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //     ]);
            // }
            // dd($request->all());
            if($this->__services->storeBanner($request)) {
                return redirect()->route('banner-list', 1)->with(['success' => 'Thêm Banner thành công!']);
            }
            return back()->with(['error' => 'Đã có lỗi xảy ra!']);
        }
        public function edit($id) {
            $data = $this->__services->getFormUpdate($id);
            return view('backend.banner.update', compact('data'));
        }
        public function postEdit(Request $request) {
            // $request->validate([
            //     'name'=>'required|max:255',
            //     'username' => 'required',
            //     'email' =>'required',
            // ]);
            
            if($request->file('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
            }
            
            if($this->__services->updateBanner($request)) {
                return redirect()->route('banner-list', 1)->with(['success' => 'Sửa banner thành công!']);
            }
        }
        public function delete($id){
            if($this->__services->delete($id)) {
                return back()->with(['success' => 'Xóa banner thành công!']);
            }else{
                return back()->with(['success' => 'Xóa banner thất bại!']);
            }
        }
        
    }
