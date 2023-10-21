<?php


namespace App\Repository\Backend;

use App\Models\Post as Model;
use Illuminate\Support\Carbon;


class PostRepository implements Contracts\PostRepositoryInterface
{
    protected $_model;

    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    public function syncPost($request)
    {
        try {
            $post = $this->save($request);
            $post->tags()->attach($request->listTags);
            return true;
        } catch (Exception $e) {
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
            'slug' => $request->slug,
            'avatar' => $request->path_file_name ?? null,
            'type' => $request->type_blog ?? null,
            'source' => $request->source ?? null,
            'pseudonym' => $request->pseudonym ?? null,
            'public_date' => $request->public_date ? Carbon::parse($request->public_date) : Carbon::now(),
            'title_seo' => $request->title_seo ?? null,
            'key_seo' => $request->key_seo ?? null,
            'desc_seo' => $request->desc_seo ?? null,
            'category_id' => $request->cate_id,
            'user_id' => $request->user_id ?? null,
            'hot_news' => $request->hot_news == 'on' ? 1 : null,
            'top_news' => $request->top_news == 'on' ? 1 : null,
            'is_emagazine' => $request->is_emagazine == 'on' ? 1 : 0,
            'status' => $request->status,
            'created_at' =>  Carbon::parse(date('Y-m-d H:s:i')),
        ]);
    }

    public function syncUpdate($request)
    {
        try {
            $post = $this->_model->find($request->id);
            $this->update($request, $post);

            $post->tags()->sync($request->listTags);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function syncIsTrash($id){
        try {
            $post = $this->_model->find($id);
            if(!$post) return false;
            $this->_model->where('id', $post->id)->update(['status'=>config('constant.post_remove')]);
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($request, $post)
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
                'slug' => $request->slug,
                'avatar' => $request->path_file_name ?? $post->avatar,
                'type' => $request->type_blog ?? null,
                'source' => $request->source ?? null,
                'pseudonym' => $request->pseudonym ?? null,
                'public_date' => $request->public_date ? Carbon::parse($request->public_date) : $post->public_date,
                'title_seo' => $request->title_seo ?? null,
                'key_seo' => $request->key_seo ?? null,
                'desc_seo' => $request->desc_seo ?? null,
                'category_id' => $request->cate_id,
                'user_id' => $request->user_id ?? null,
                'hot_news' => $request->hot_news == 'on' ? 1 : null,
                'top_news' => $request->top_news == 'on' ? 1 : null,
                'is_emagazine' => $request->is_emagazine == 'on' ? 1 : 0,
                'status' => $request->status,
                // 'created_at' => $request->public_date ? Carbon::parse($request->public_date) : $post->created_at,
            ]);
    }

    // public function getListPostByStatus($status,$user_id ='', $paginate = 10)
    // {
    //     $cons = $this->_model->where('status', $status);
    //     if($user_id) $cons = $cons->where('user_id',$user_id);
    //     $cons = $cons->orderBy('created_at', 'DESC')->paginate($paginate);
    //     return $cons;
    // }

    public function getListPostByStatus($status,$request,$user_id ='',$paginate)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        $modelPost = $this->_model
            ->where('status', $status);
        if ($user_id) {
            $modelPost->where('user_id', $user_id);
        }
        if ($request->category_id) {
            $modelPost
                ->where('category_id', $request->category_id);
        }
        if ($request->user_id) {
            $modelPost
                ->where('user_id', $request->user_id);
        }
        if ($request->keyword) {
            $modelPost->where(function ($query) use ($request){
               return $query->where('title_vi', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description_vi', 'like', '%' . $request->keyword . '%');
            });
        }
        return $modelPost
            ->orderBy('public_date', 'DESC')
            ->paginate($paginate);
    }

    public function getDetailPost($slug,$id)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('slug', $slug)
            ->where('id', $id)
            ->with('category')
            ->with('tags')
            ->with('admins')
            ->first();
    }

    public function getListBlogRelation($category_id, $post_id)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('category_id', $category_id)
            ->where('id', '!=', $post_id)
            ->where('status', config('constant.post_approved'))
            ->with('category')
            ->orderBy('public_date', 'DESC')
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->paginate(9,['*']);
    }

    public function getHotNew()
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('status', config('constant.post_approved'))
            ->where('hot_news', 1)
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->limit(10)
            ->orderBy('public_date', 'DESC')
            ->get();
    }

    public function getNewPost()
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('status', config('constant.post_approved'))
            ->with('category')
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->orderBy('public_date', 'DESC')
            ->limit(8)
            ->get();
    }

    public function getListMedia()
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('type', config('constant.post_video'))
            ->where('status', config('constant.post_approved'))
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->limit(3)
            ->union(
                $this->_model
                    ->where('type', config('constant.post_image'))
                    ->where('status', config('constant.post_approved'))
                    ->take(2)
            )
            ->get();
    }

    public function getListMediaTop()
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('type', config('constant.post_video'))
            ->where('status', config('constant.post_approved'))
            ->offset(0)
            ->limit(3)
            ->orderBy('public_date', 'DESC')
            ->union(
                $this->_model
                    ->where('type', config('constant.post_image'))
                    ->where('status', config('constant.post_approved'))
                    ->offset(0)
                    ->limit(2)
                    ->orderBy('public_date', 'DESC')
            )
            ->get();
    }

    public function getAllVideoPost() {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('type', config('constant.post_video'))
            ->where('status', config('constant.post_approved'))
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->offset(3)
            ->orderBy('public_date', 'DESC')
            ->paginate(12,['*'], 'video');
    }

    public function getAllImagePost() {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('type', config('constant.post_image'))
            ->where('status', config('constant.post_approved'))
            ->offset(2)
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->orderBy('public_date', 'DESC')
            ->paginate(12, ['*'], 'image');
    }

    public function getListVideoRelation($id) {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('type', config('constant.post_video'))
            ->where('status', config('constant.post_approved'))
            ->where('id','!=', $id)
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->orderBy('public_date', 'DESC')
            ->paginate(12,['*'], 'video');
    }

    public function getListVideoTop($id) {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->where('type', config('constant.post_video'))
            ->where('status', config('constant.post_approved'))
            ->where('top_news', config('constant.active'))
            ->whereNotIn('id', [$id])
            ->orWhere('hot_news', config('constant.active'))
            ->where('top_news','!=', null)
            ->orWhere('hot_news', '!=' , null)
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->orderBy('public_date', 'DESC')
            ->paginate(12,['*'], 'video');
    }
    public function search($request) {
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
            ->orWhere('title_vi', 'like', '%' . $request->search . '%')
            ->orWhere('title_en','like', '%' . $request->search . '%')
            ->orWhere('description_vi','like', '%' . $request->search . '%')
            ->orWhere('description_en','like', '%' . $request->search . '%')
            ->where('status', config('constant.post_approved'))
            ->where(function ($sub) use ($current_timestamp) {
                $sub->where('public_date', '<=', $current_timestamp)
                    ->orWhereNull('public_date');
                })
            ->orderBy('public_date', 'DESC')
            ->paginate(12,['*']);
    }
    public function countSeach($request){
        $current_timestamp = Carbon::now()->toDateTimeString();
        return $this->_model
        ->orWhere('title_vi', 'like', '%' . $request->search . '%')
        ->orWhere('title_en','like', '%' . $request->search . '%')
        ->orWhere('description_vi','like', '%' . $request->search . '%')
        ->orWhere('description_en','like', '%' . $request->search . '%')
        ->where(function ($sub) use ($current_timestamp) {
            $sub->where('public_date', '<=', $current_timestamp)
                ->orWhereNull('public_date');
            })
        ->where('status', config('constant.post_approved'))
        ->count();
    }
}
