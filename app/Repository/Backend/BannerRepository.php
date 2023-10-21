<?php


namespace App\Repository\Backend;

use App\Models\Banner;


class BannerRepository implements Contracts\BannerRepositoryInterface
{
    protected $_model;

    public function __construct(Banner $model)
    {
        $this->_model = $model;
    }

    public function getAll()
    {
        return $this->_model->get();
    }

    public function getAllBanner($is_page=1,$paginate = 5, $keyword = '')
    {
        if ($keyword != '') {
            $this->_model = $this->_model->where('title_vi', 'like','%'.$keyword.'%')->where('is_page',$is_page);
        
        }
        // dd($this->_model->paginate($paginate, ['*'], 'np'));
        return $this->_model->where('is_page',$is_page)->orderBy('order_no', 'ASC')->paginate($paginate, ['*'], 'np');
    }
    public function getAllBannerShow($is_trash)
    {
        return $this->_model->where('is_trash', $is_trash)->orderBy('order_no', 'ASC')->get();
    }
    public function getBannerShow($location,$is_page)
    {
        return $this->_model->where('is_trash', 0)
        ->where('location', $location)
        ->where('is_page', $is_page)
        ->orderBy('order_no', 'ASC')->get();
    }
    public function syncBanner($request)
    {
        try {
            $banner = $this->save($request);
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function syncBannerUpdate($request)
    {
        try {
            $banner = $this->_model->find($request->id);
            $banner = $this->update($request,$banner);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function save($request)
    {
        return $this->_model->create([
            'title_vi' => $request->title_vi,
            'title_en' => $request->title_en ?? null,
            'description_vi' =>$request->description_vi ?? null,
            'description_en' =>$request->description_en ?? null,
            'order_no' => $request->order_no,
            'is_trash' => $request->is_trash == 'on' ? 0 : 1,
            'location' => $request->location ?? 1,
            'is_page' => $request->is_page ?? 1,
            'link' => $request->link ?? null,
            'image' => $request->path_file_name ?? null,
            'image_mobi' => $request->path_file_name_mobi ?? null,
        ]);
    }
    public function update($request, $banner)
    {
        // dd($banner);
            $arrUpdate = [
                'title_vi' => $request->title_vi ?? null,
                'title_en' => $request->title_en ?? null,
                'description_vi' =>$request->description_vi ?? null,
                'description_en' =>$request->description_en ?? null,
                'order_no' => $request->order_no,
                'is_trash' => $request->is_trash == 'on' ? 0 : 1,
                'link' => $request->link ?? null,
                'location' => $request->location ?? 1,
                'is_page' => $request->is_page ?? 1,
                'image' => $request->path_file_name ?? $banner->image,
                'image_mobi' => $request->path_file_name_mobi ?? $banner->image_mobi,
            ];
        return $this->_model
            ->where('id', $banner->id)
            ->update($arrUpdate);
    }
    public function getDetailBanner($id)
    {
        return $this->_model->find($id);
    }
    public function syncDelete($id)
    {
        $banner = $this->_model->find($id);
        try {
            $deletedRows = $this->_model->where('id', $id)->delete();
            if ($deletedRows>0){
                return $banner->image;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
