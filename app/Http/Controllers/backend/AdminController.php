<?php

    namespace App\Http\Controllers\backend;

    use App\Http\Controllers\Controller;
    use App\Models\User;
    use App\Services\BackendServices\AdminServices;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AdminController extends Controller
    {
        protected $__services;

        public function __construct(AdminServices $services)
        {
            $this->__services = $services;
        }

        public function index(Request $request)
        {
            // dd('123');
            // dd(Auth::user()->avatar);
            $keyWord = $request->input('keyword') ?? '';
            $account = $this->__services->getAllAdminAccount(10, $keyWord);

            return view('backend.account.index')->with(compact('account','account'));
        }
        public function create() {
            $data = $this->__services->getFormAddAdmin();
            
            return view('backend.account.create-account', compact('data'));
        }
        public function createAccount(Request $request) {
            $request->validate([
                'name'=>'required|max:255',
                'username' => 'required',
                'email' =>'required',
            ]);
    
            // if($request->file('avatar')) {
            //     $request->validate([
            //         'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //     ]);
            // }
            
            if($this->__services->storeAccount($request)) {
                return redirect()->route('account-list')->with(['success' => 'Thêm nhân sự thành công!']);
            }
            return back()->with(['error' => 'Đã có lỗi xảy ra!']);
        }
        public function edit($id) {
            $data = $this->__services->getFormUpdate($id);
            return view('backend.account.update-account', compact('data'));
        }
        public function postEdit(Request $request) {
            $request->validate([
                'name'=>'required|max:255',
                'username' => 'required',
                'email' =>'required',
            ]);
            
            if($request->file('avatar')) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            }
            
            if($this->__services->updateAccount($request)) {
                return redirect()->route('account-list', $request->status)->with(['success' => 'Update nhân sự thành công!']);
            }
            // return back()->with(['error' => 'Đã có lỗi xảy ra!']);
        }
        
    }
