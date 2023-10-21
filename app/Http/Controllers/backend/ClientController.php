<?php

    namespace App\Http\Controllers\backend;

    use App\Http\Controllers\Controller;
    use App\Models\Client;
    use App\Services\BackendServices\ClientServices;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class ClientController extends Controller
    {
        protected $__services;

        public function __construct(ClientServices $services)
        {
            $this->__services = $services;
        }

        public function index(Request $request)
        {
            // dd('123');
            // dd(Auth::user()->avatar);
            $keyWord = $request->input('keyword') ?? '';
            $client = $this->__services->getAllClientAccount(10, $keyWord);

            return view('backend.client.index')->with(compact('client','client'));
        }
        public function create() {
            $data = $this->__services->getFormAddClient();
            
            return view('backend.client.create', compact('data'));
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
            // dd($request->all());
            if($this->__services->storeClient($request)) {
                return redirect()->route('client-list', $request->status)->with(['success' => 'Thêm đối tác thành công!']);
            }
            // return back()->with(['error' => 'Đã có lỗi xảy ra!']);
        }
        public function edit($id) {
            $data = $this->__services->getFormUpdate($id);
            // dd($data);
            return view('backend.client.update', compact('data'));
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
                return redirect()->route('client-list', $request->status)->with(['success' => 'Thêm đối tác thành công!']);
            }
        }
        public function delete($id){
            if($this->__services->delete($id)) {
                return redirect()->route('client-list')->with(['success' => 'Xóa đối tác thành công!']);
            }else{
                return redirect()->route('client-list')->with(['success' => 'Xóa đối tác thất bại!']);
            }
        }
        
    }
