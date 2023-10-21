<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ContactServices;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    protected $_service;
    public function __construct(ContactServices $service)
    {
        $this->_service =$service;
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
    public function emailNoti(Request $request){
        $request->validate([
            'email'=>'required|max:255',
        ]);

        if($this->_service->mailNoti($request)) {
            return back()->with(['success' => 'Thành công. Chúng tôi sẽ gửi thông báo cho bạn !']);
        }
        return back();
    }

}
