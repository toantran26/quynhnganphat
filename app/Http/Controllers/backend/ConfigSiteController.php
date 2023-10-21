<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Services\BackendServices\ConfigSiteService;

use Illuminate\Http\Request;

class ConfigSiteController extends Controller
{
    protected $_service;

    public function __construct(ConfigSiteService $service)
    {
        $this->_service = $service;
    }
    public function index() {
        $path_config = storage_path('config.json');
        $info = json_decode(file_get_contents($path_config), true);
        return view('backend.setting.index', compact('info'));
    }
    public function configMenu() {
        return $this->_service->configMenu();
    }

    public function addMenu(Request $request) {
        $request->validate([
            'menu_name' => 'required|max:100',
            'slug' => 'required|max:100',
            // 'link' => 'required|max:100',
            // 'position' => 'required',
        ]);
       $request->link = $request->link == null ?$request->slug: $request->link;
        return $this->_service->saveMenu($request);
    }

    public function savePosition(Menu $menu, $positon) {

    }
    public function update_position(Request $request) {
        
        // dd($request->all());
        if($request->input('position')){
            if($request->input('position')) foreach($request->input('position') as $key=>$val) 
            Menu::where('id' ,$key)->update(array('position'=>$val));
        }
        if($request->input('name_en')){
            if($request->input('name_en')) foreach($request->input('name_en') as $key=>$val) 
            Menu::where('id' ,$key)->update(array('name_en'=>$val));
        }
        if($request->input('link')){
            if($request->input('link')) foreach($request->input('link') as $key=>$val) 
            Menu::where('id' ,$key)->update(array('link'=>$val));
        }
        return redirect()->route('config-menu')->with(['success' => 'Sửa thành công vị trí menu !']);
    }
    public function edit($id) {
        
        return $this->_service->formEditMenu($id);
    }
    public function update(Request $request) {
        $request->validate([
            'menu_name' => 'required|max:100',
            'slug' => 'required|max:100',
            // 'link' => 'required|max:100',
            // 'position' => 'required',
        ]);
        if(!$request->link) $request->link = $request->slug;
        if($this->_service->updateMenu($request)) {
            return redirect()->route('config-menu', $request->status)->with(['success' => 'Sửa menu thành công!']);
        }
        
    }
    public function updateInfo(Request $request) {
        if($this->_service->updateInfo($request)) {
            return redirect()->back()->with(['success'=>'Cập nhật thành công!']);
        }

        return redirect()->back()->with(['error'=>'Cập nhật thất bại!']);
    }
}
