<?php

namespace App\Repository\Backend;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class CategoriesRepository implements Contracts\CategoriesRepositoryInterface
{
  protected $_model;
  protected $_post;

  public function __construct(Category $model, Post $post)
  {
    $this->_model = $model;
    $this->_post = $post;
  }

  public function getInfoCate($slug)
  {
    return $this->_model->where('slug', $slug)->first();
  }
  // public function getDataPostCate($id,$limit=10) {
  //     return $this->_model->where('id', $id)->with('children.children2.posts')->with('children.posts')->with('posts' , function($query) use($limit){
  //         $query->where('status',config('constant.post_approved'))->orderBy('created_at','DESC')
  //         ->take($limit)->paginate(10);
  //     })
  //     ->first();
  // }
  public function getAllCategories($is_trash = 0)
  {
    return $this->_model
      ->with(implode('.', array_fill(0, 4, 'children2')))
      ->where('is_trash', $is_trash)
      ->whereNull('parent_id')->orWhere('parent_id', '=', 0)->get();
  }
  public function getOne($id)
  {
    return $this->_model->find($id);
  }
  public function getDataChill($is_trash = 0)
  {

    return $this->_model
      ->where('is_trash', $is_trash)
      ->with(implode('.', array_fill(0, 4, 'children')))
      ->where('parent_id', '=', NULL)->get();
  }
  public function getListCategoryParent()
  {
    return $this->_model
      ->where('is_trash', 0)
      ->where('parent_id', '=', null)
      //    ->where('status',0)
      ->get();
  }

  public function  save($request)
  {
    return  $this->_model = $this->_model->create([
      'title_vi' => $request->title_vi,
      'title_en' => $request->title_en ?? '',
      'slug' => $request->slug,
      'status' => $request->status == 'on' ? 0 : 1,
      'is_trash' => $request->is_trash ?? 0,
      'top_cate' => $request->top_cate ?? null,
      'parent_id' => $request->parent_id ?? null,
      'key_seo' => $request->key_seo ?? '',
      'title_seo' => $request->title_seo ?? '',
      'desc_seo' => $request->desc_seo ?? '',
    ]);
  }
  public function  update($request, $category)
  {
    return  $this->_model->where('id', $category->id)->update([
      'title_vi' => $request->title_vi,
      'title_en' => $request->title_en ?? $category->title_en,
      'slug' => $request->slug ??  $category->slug,
      'status' => $request->status == 'on' ? 0 : 1,
      'is_trash' => $request->is_trash ?? $category->is_trash,
      'top_cate' => $request->top_cate ?? null,
      'parent_id' => $request->cate_id ?? null,
      'key_seo' => $request->key_seo ?? '',
      'title_seo' => $request->title_seo ?? '',
      'desc_seo' => $request->desc_seo ?? '',
    ]);
  }
  public function syncCategoryUpdate($request)
  {
    try {

      $category = $this->_model->find($request->id);
      // dd($request->all());
      $updateCategory = $this->update($request, $category);
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }
  public function syncDelete($id)
  {
    $category = $this->_model->find($id);
    try {
      $deleteCategory = $this->_model->where('id', $id)->update(['is_trash' => 1]);
      if ($deleteCategory) {
        $this->_post->where('category_id', $id)->update([
          'status' => config('constant.post_remove')
        ]);
        return true;
      }
      return false;
    } catch (\Exception $e) {
      return false;
    }
  }

  // frontend
  public function getDataPostCate($id, $limit = 10)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    $categoryIds = $this->_model->where('parent_id', $id)->pluck('id')->push($id)->all();

    $this->_post = $this->_post->where('status', config('constant.post_approved'));
    if (App::currentLocale() == 'en') $this->_post = $this->_post->where('title_en', '<>', null);
    return  $this->_post->whereIn('category_id', $categoryIds)
      ->where(function ($sub) use ($current_timestamp) {
        $sub->where('public_date', '<=', $current_timestamp)
          ->orWhereNull('public_date');
      })
      ->orderBy('posts.created_at', 'DESC')->paginate($limit);
  }
  public function getDataPostCateHome($id, $limit = 5)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    $categoryIds = $this->_model->where('parent_id', $id)->pluck('id')->push($id)->all();
    return  $this->_post->whereIn('category_id', $categoryIds)->where('status', config('constant.post_approved'))->orderBy('posts.created_at', 'DESC')->paginate($limit);
  }
  public function getDataPostCateRight($id, $limit)
  {

    $current_timestamp = Carbon::now()->toDateTimeString();
    // dd(App::currentLocale() == 'en');
    $this->_post = $this->_post->where('status', config('constant.post_approved'));
    if (App::currentLocale() == 'en') $this->_post = $this->_post->where('title_en', '<>', null);
    return  $this->_post->where('category_id', $id)->where('hot_news', 1)
      ->orderBy('posts.created_at', 'DESC')
      ->paginate($limit);
  }
  public function getDataLoadCateRight($id, $page)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    $this->_post = $this->_post->where('status', config('constant.post_approved'));
    if (App::currentLocale() == 'en') $this->_post = $this->_post->where('title_en', '<>', null);
    return  $this->_post->where('category_id', $id)->where('hot_news', 1)
      ->orderBy('posts.created_at', 'DESC')
      ->offset(5 * $page)
      ->limit(5)->get();
  }
  public function getDataLoadMoreCate($id, $page)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    $this->_post = $this->_post->where('status', config('constant.post_approved'));
    if (App::currentLocale() == 'en') $this->_post = $this->_post->where('title_en', '<>', null);
    return  $this->_post->where('category_id', $id)
      ->orderBy('posts.created_at', 'DESC')
      ->offset(3 + (5 * $page))
      ->limit(5)->get();
  }
  public function getPostDataBySlugCate($slug, $limit = null)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    $this->_model = $this->_model
      ->where('slug', $slug);

    if ($limit == 7) {
      $this->_model = $this->_model->with('posts', function ($query) {
        $query->where('top_news', 1)
          ->where('status', config('constant.post_approved'))
          ->orderBy('created_at', 'DESC')
          ->take(7);
      });
    } else if ($limit == 'not_top') {
      $this->_model = $this->_model->with('posts', function ($query) {
        $query->where('top_news', '!=', '1')
          ->orWhereNull('top_news')
          ->where('status', config('constant.post_approved'))
          ->orderBy('created_at', 'DESC')
          ->take(7);
      });
    } else {
      return $this->_post
        ->select('posts.*', 'categories.title_vi', 'categories.id as cate_id')
        ->where('posts.top_news', '!=', 1)
        ->orWhereNull('top_news')
        ->where('posts.status', config('constant.post_approved'))
        ->join('categories', function ($query) use ($slug) {
          $query->on('posts.category_id', '=', 'categories.id')
            ->on('categories.id', '=', 'categories.parent_id')
            ->where('categories.slug', $slug);
        })
        ->orderBy('posts.created_at', 'DESC')->paginate(10);
    }

    return $this->_model->first();
  }
  public function getAllPostCate($slug)
  {

    return $this->_model
      ->with(implode('.', array_fill(0, 4, 'children2')))
      ->where('status', 0)
      ->where('parent_id', '=', 4)->get();
  }
  public function getCateHome()
  {
    return $this->_model
      ->where('status', config('constant.cate_active'))
      ->with('posts', function ($query) {
        $query->where('status', config('constant.post_approved'))
          ->where('top_news', 1)
          ->orderBy('created_at', 'DESC');
      })
      ->limit(2)
      ->get()
      ->map(function ($posts) {
        $posts->setRelation('posts', $posts->posts->take(5));
        return $posts;
      });
  }

  public function getListCateHome()
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_model
      ->select('*')
      ->where('status', config('constant.cate_active'))
      ->where('top_cate', '!=', null)
      ->with('posts', function ($query) {
        $query->orderBy('created_at', 'DESC')
          ->where('status', config('constant.post_approved'))
          ->orderBy('created_at', 'DESC');;
      })
      ->limit(3)
      ->orderBy('top_cate', 'ASC')
      ->get()
      ->map(function ($posts) {
        $posts->setRelation('posts', $posts->posts->take(7));
        return $posts;
      });
  }
}
