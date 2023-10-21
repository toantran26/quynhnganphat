<?php


namespace App\Repository\Frontend;


use App\Models\Page;
use App\Models\Post;
use App\Models\Category;

use App\Repository\Frontend\Contracts\PostRepositoryInterface;

use Carbon\Carbon;

class PostRepository implements PostRepositoryInterface
{
  protected $_post;
  protected $_page;
  protected $_category;
  public function __construct(Post $post, Page $page, Category $category)
  {
    $this->_post = $post;
    $this->_page = $page;
    $this->_category = $category;
  }

  public function getdetailPost($slug, $id)
  {
    return $this->_post
      ->where('id', $id)
      ->where('slug', $slug)
      ->with('category')
      ->with('tags')
      ->first();
  }

  public function getrelatedPost($cate_id, $id)
  {
    return $this->_post
      ->where('id', '<>', $id)
      ->where('category_id', $cate_id)
      ->with('category')
      ->get();
  }

  public function getDataIntroduce()
  {
    return $this->_post
      ->where('id', 1)
      ->with('category')
      ->first();
  }

  public function getPostCategoryId($id, $limit)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post->where('category_id', $id)
      ->where('public_date', '<=', $current_timestamp)
      ->with('category')
      ->where('posts.status', config('constant.post_approved'))
      ->orderBy('created_at', 'DESC')
      ->inRandomOrder()
      ->paginate($limit, ['*']);
    // ->limit($limit)->get();
  }

  public function getDataLoadMore($cate_id, $page)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    $this->_post = $this->_post->where('status', config('constant.post_approved'));
    // if (App::currentLocale() == 'en') $this->_post = $this->_post->where('en_title', '<>', null);
    return $this->_post->where('category_id', $cate_id)
      ->where('public_date', '<=', $current_timestamp)
      ->orderBy('posts.created_at', 'DESC')
      ->with('category')
      ->offset(10 * $page)
      ->limit(10)->get();
  }

  public function getDetailPage($slug, $id)
  {
    return $this->_page
      ->where('id', $id)
      ->where('slug', $slug)
      ->first();
  }
  public function getListBlogRelation($category_id, $post_id, $limit)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post
      ->where('category_id', $category_id)
      ->where('id', '!=', $post_id)
      ->where('status', config('constant.post_approved'))
      ->with('category')
      ->where('public_date', '<=', $current_timestamp)
      ->orderBy('public_date', 'DESC')
      ->paginate($limit, ['*']);
  }
  public function getDataPostByCateParent($cate_id, $limit)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    $categoryIds = $this->_category->where('parent_id', $cate_id)->pluck('id')->push($cate_id)->all();
    return $this->_post
      ->whereIn('category_id', $categoryIds)
      ->where('status', config('constant.post_approved'))
      ->where('public_date', '<=', $current_timestamp)
      ->orderBy('created_at', 'DESC')
      ->paginate($limit);
  }
  public function search($request)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post
      ->orWhere('title_vi', 'like', '%' . $request->search . '%')
      ->orWhere('title_en', 'like', '%' . $request->search . '%')
      ->orWhere('description_vi', 'like', '%' . $request->search . '%')
      ->orWhere('description_en', 'like', '%' . $request->search . '%')
      ->where('status', config('constant.post_approved'))
      ->where(function ($sub) use ($current_timestamp) {
        $sub->where('public_date', '<=', $current_timestamp)
          ->orWhereNull('public_date');
      })
      ->orderBy('public_date', 'DESC')
      ->paginate(5, ['*']);
  }
  public function getDataLoadMoreSearch($search, $page)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post
      ->orWhere('title_vi', 'like', '%' . $search . '%')
      ->orWhere('title_en', 'like', '%' . $search . '%')
      ->orWhere('description_vi', 'like', '%' . $search . '%')
      ->orWhere('description_en', 'like', '%' . $search . '%')
      ->where('status', config('constant.post_approved'))
      ->where(function ($sub) use ($current_timestamp) {
        $sub->where('public_date', '<=', $current_timestamp)
          ->orWhereNull('public_date');
      })
      ->orderBy('public_date', 'DESC')
      ->offset(5 + (5 * $page))
      ->limit(5)->get();
  }
  public function countSeach($request)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post
      ->orWhere('title_vi', 'like', '%' . $request->search . '%')
      ->orWhere('title_en', 'like', '%' . $request->search . '%')
      ->orWhere('description_vi', 'like', '%' . $request->search . '%')
      ->orWhere('description_en', 'like', '%' . $request->search . '%')
      ->where(function ($sub) use ($current_timestamp) {
        $sub->where('public_date', '<=', $current_timestamp)
          ->orWhereNull('public_date');
      })
      ->where('status', config('constant.post_approved'))
      ->count();
  }
  public function getAllVideoPost()
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post
      ->where('type', config('constant.post_video'))
      ->where('status', config('constant.post_approved'))
      ->offset(5)
      ->orderBy('created_at', 'DESC')
      ->paginate(5, ['*'], 'video');
  }
  public function getAllImagePost()
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post
      ->where('type', config('constant.post_image'))
      ->where('status', config('constant.post_approved'))
      ->offset(5)
      ->orderBy('created_at', 'DESC')
      ->paginate(5, ['*'], 'image');
  }
}
