<?php


namespace App\Services\BackendServices;

use App\Repository\Backend\Contracts\BannerRepositoryInterface as Model;
use Illuminate\Http\Request;

class BannerServices
{
    const path_file = 'uploads/banner';
    protected $__model;
    public function __construct(Model $model)
    {
        $this->__model = $model;
    }

    public function getAllBanner($is_page,$paginate, $keword)
    {
        return $this->__model->getAllBanner($is_page,$paginate, $keword);
    }
    public function getAllBannerShow($is_trash=0)
    {
        return $this->__model->getAllBannerShow($is_trash);
    }
    public function getBannerShow($location=1,$is_page=1){
        return $this->__model->getBannerShow($location,$is_page);
    }
    public function getFormAddBanner()
    {
        return true;
    }
    public function getFormUpdate($id) {
        $banner = $this->__model->getDetailBanner($id);
        return ['banner'=>$banner];
    }
    public function storeBanner(Request $request){
        if($request->image) {
            $file = $request->image;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }
        if($request->image_mobi) {
            $file = $request->image_mobi;
            $fileNameMobi  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileNameMobi);
            $request->path_file_name_mobi = '/'.self::path_file.'/'.$fileNameMobi;
        }
        return $this->__model->syncBanner($request);
    }
    public function updateBanner(Request $request){
        if($request->image) {
            $file = $request->image;
            $fileName  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileName);
            $request->path_file_name = '/'.self::path_file.'/'.$fileName;
        }
        if($request->image_mobi) {
            $file = $request->image_mobi;
            $fileNameMobi  = time().$file->getClientOriginalName();
            $file->move(public_path(self::path_file), $fileNameMobi);
            $request->path_file_name_mobi = '/'.self::path_file.'/'.$fileNameMobi;
        }
        return $this->__model->syncBannerUpdate($request);
    }
    public function delete($id){
        $delete = $this->__model->syncDelete($id);
        unlink(public_path($delete));
        return true;
    }

}