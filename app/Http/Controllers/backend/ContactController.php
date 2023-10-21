<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BackendServices\ContactServices;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    protected $_service;
    public function __construct(ContactServices $service)
    {
        $this->_service =$service;
    }
    public function index(Request $request)
        {
            $keyWord = $request->input('keyword') ?? '';
            $contact = $this->_service->getAllContactAccount(10, $keyWord);

            return view('backend.contact.index')->with(compact('contact','contact'));
        }
        public function create() {
            $data = $this->_service->getFormAddContact();
            
            return view('backend.contact.create', compact('data'));
        }
        public function store(Request $request) {
            $request->validate([
                'name'=>'required|max:255',
            ]);
    
            if($request->file('avatar')) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            }
            // dd($request->all());
            if($this->_service->storeContact($request)) {
                return redirect()->route('contact-list', $request->status)->with(['success' => 'Thêm khách hàng liên hệ thành công!']);
            }
            // return back()->with(['error' => 'Đã có lỗi xảy ra!']);
        }
        public function edit($id) {
            $data = $this->_service->getFormUpdate($id);
            // dd($data);
            return view('backend.contact.update', compact('data'));
        }
        public function postEdit(Request $request) {
            $request->validate([
                'name'=>'required|max:255',
            ]);
            
            if($request->file('avatar')) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            }
            
            if($this->_service->updateAccount($request)) {
                return redirect()->route('contact-list', $request->status)->with(['success' => 'Thêm khách hàng liên hệ thành công!']);
            }
        }
        public function delete($id){
            if($this->_service->delete($id)) {
                return redirect()->route('contact-list')->with(['success' => 'Xóa khách hàng liên hệ thành công!']);
            }else{
                return redirect()->route('contact-list')->with(['success' => 'Xóa khách hàng liên hệ thất bại!']);
            }
        }
    public function submitContact(Request $request){
        $request->validate([
            'fullname'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|max:255',
            'title'=>'required|max:255',
        ]);
        if($this->_service->storeContact($request)) {
            return back()->with(['success' => 'Thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất!']);
        }
        return back()->with(['error' => 'Đã có lỗi xảy ra!']);
    }

}
