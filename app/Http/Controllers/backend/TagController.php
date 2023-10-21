<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Services\BackendServices\TagServices;

class TagController extends Controller
{
    protected $__services;

    public function __construct(TagServices $services)
    {
        $this->__services = $services;
    }

    public function index(Request $request)
    {
        // dd('123');
        $keyWord = $request->input('keyword') ?? '';
        $list_tag = $this->__services->getAllTag(10, $keyWord);

        return view('backend.tag.index')->with(compact('list_tag', 'list_tag'));
    }
}
