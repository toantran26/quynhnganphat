<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BackendServices\ClientServices;
class PartnerController extends Controller
{
    protected $_service;

    public function __construct(ClientServices $service)
    {
        $this->_service =$service;
    }
    public function index() {

        $listPartner = $this->_service->getAllClientAccount(12,'');
        // dd($listManagement);
        return view('frontend.category.partner',compact('listPartner'));
    }
}
