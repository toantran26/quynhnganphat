<?php


namespace App\Repository\Backend;

use App\Models\Page as Model;
use Illuminate\Support\Carbon;


class PageRepository implements Contracts\PageRepositoryInterface
{
    protected $_model;

    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    public function syncPage($request)
    {
        try {
            $page = $this->save($request);
            return $page;
        } catch (\Exception $e) {
            return false;
        }

    }

    public function save($request)
    {
        return $this->_model->create([
            'title_vi' => $request->title_vi,
            'title_en' => $request->title_en ?? null,
            'description_vi' => $request->description_vi ?? null,
            'description_en' => $request->description_en ?? null,
            'content_vi' => $request->content_vi,
            'content_en' => $request->content_en ?? null,
            'slug' => $request->slug ?? null,
            'title_seo' => $request->title_seo ?? null,
            'key_seo' => $request->key_seo ?? null,
            'desc_seo' => $request->desc_seo ?? null,
            'author_id' => $request->author_id ?? null,
            'status' => $request->status,
        ]);
    }

    public function syncUpdate($request)
    {
        try {
            $page = $this->_model->find($request->id);
            $this->update($request, $page);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function syncIsTrash($id){
        try {
            $page = $this->_model->find($id);
            if(!$page) return false;
            $this->_model->where('id', $page->id)->update(['status'=>config('constant.page_remove')]);
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($request, $page)
    {
        return $this->_model
            ->where('id', $request->id)
            ->update([
                'title_vi' => $request->title_vi,
                'title_en' => $request->title_en ?? null,
                'description_vi' => $request->description_vi ?? null,
                'description_en' => $request->description_en ?? null,
                'content_vi' => $request->content_vi,
                'content_en' => $request->content_en ?? null,
                'slug' => $request->slug ?? $page->slug,
                'title_seo' => $request->title_seo ?? null,
                'key_seo' => $request->key_seo ?? null,
                'desc_seo' => $request->desc_seo ?? null,
                'status' => $request->status,
                'author_id' => $request->author_id ?? $page->author_id,
            ]);
    }
    public function getListPage($request,$paginate = 10)
    {
        $page = $this->_model
            ->where('status',2);
        if ($request->keyword) {
            $page->where(function ($query) use ($request){
               return $query->where('title_vi', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description_vi', 'like', '%' . $request->keyword . '%');
            });
        }
        return $page->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public function getDetailPage($id)
    {
        return $this->_model->find($id);
    }
}
