<?php

    namespace App\Http\Controllers\backend;

    use App\Http\Controllers\Controller;
    use App\Models\Management;
    use App\Services\BackendServices\ManagementServices;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class ManagementController extends Controller
    {
        protected $__services;

        public function __construct(ManagementServices $services)
        {
            $this->__services = $services;
        }

        public function index(Request $request)
        {
            $keyWord = $request->input('keyword') ?? '';
            if($request->input('order_no')){
                if($request->input('order_no')) foreach($request->input('order_no') as $key=>$val) 
                Management::where('id' ,$key)->update(array('order_no'=>$val));
            }
            $management = $this->__services->getAllManagementAccount(10, $keyWord);
            $management->appends(request()->except('page'));

            return view('backend.management.index')->with(compact('management','management'));
        }
        public function create() {
            $data = $this->__services->getFormAddManagement();
            
            return view('backend.management.create', compact('data'));
        }
        public function store(Request $request) {
            $request->validate([
                'name_vi'=>'required|max:255',
            ]);
    
            if($request->file('avatar')) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            }
            if($this->__services->storeManagement($request)) {
                return redirect()->route('config-management', $request->status)->with(['success' => 'Thêm lãnh đạo thành công!']);
            }
            return back()->with(['error' => 'Đã có lỗi xảy ra!']);
        }
        public function edit($id) {
            $data = $this->__services->getFormUpdate($id);
            // dd($data);
            return view('backend.management.update', compact('data'));
        }
        public function postEdit(Request $request) {
            $request->validate([
                'name_vi'=>'required|max:255',
            ]);
            
            if($request->file('avatar')) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            }
            
            if($this->__services->updateAccount($request)) {
                return redirect()->route('config-management', $request->status)->with(['success' => 'Sửa lãnh đạo thành công!']);
            }
        }
        public function delete($id){
            if($this->__services->delete($id)) {
                return back()->with(['success' => 'Xóa lãnh đạo thành công!']);
            }else{
                return back()->with(['success' => 'Xóa lãnh đạo thất bại!']);
            }
        }
        
    }
