<?php


namespace App\Repository\Frontend;


use App\Models\Banner;
use App\Models\Category;
use App\Models\Client as Partner;
use App\Models\Course;
use App\Models\Page;
use App\Models\Post;
use App\Repository\Frontend\Contracts\HomepageRepositoryInterface;
use Illuminate\Support\Carbon;

class HomepageRepository implements HomepageRepositoryInterface
{
  protected $_banner;
  protected $_partner;
  protected $_cate;
  protected $_post;
  protected $_course;
  protected $_page;


  public function __construct(
    Banner $banner,
    Partner $partner,
    Post $post,
    Category $cate,
    Course $course,
    Page $page
  ) {
    $this->_banner = $banner;
    $this->_partner = $partner;
    $this->_post = $post;
    $this->_cate = $cate;
    $this->_course = $course;
    $this->_page = $page;
  }

  public function getListBanner()
  {
    return $this->_banner->where('is_trash', 0)->orderBy('order_no', 'ASC')->get();
  }

  public function getListPartner()
  {
    return $this->_partner->all();
  }

  public function getPageHomepage()
  {
    return $this->_page
      ->orderBy('id', 'ASC')
      ->take(3)
      ->get();
  }

  public function getPostNews()
  {
    return $this->_cate->where('id', 2)->with('children', function ($query) {
      $query->select([
        'posts.*', 'categories.*',
        'posts.id as post_id',
        'posts.slug as post_slug',
        'posts.created_at as post_created_at',
        'posts.updated_at as post_updated_at_at'
      ])
        ->join('posts', 'categories.id', '=', 'posts.category_id')
        ->orderBy('posts.created_at', 'DESC')
        ->limit(9);
    })->first();
  }

  public function getTopNews()
  {
    return $this->_post->where('top_news', 1)
      ->limit(4)
      ->get();
  }

  public function getScientificPost()
  {
    return $this->_cate->where('id', 3)->with('children', function ($query) {
      $query->select([
        'posts.*', 'categories.*',
        'posts.id as post_id',
        'posts.slug as post_slug',
        'posts.created_at as post_created_at',
        'posts.updated_at as post_updated_at_at'
      ])
        ->join('posts', 'categories.id', '=', 'posts.category_id')
        ->orderBy('posts.created_at', 'DESC')
        ->limit(9);
    })->first();
  }

  public function getCourseHome()
  {
    return $this->_course
      ->limit(9)
      ->orderBy('created_at', 'DESC')
      ->get();
  }

  public function search($request)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post
      ->orWhere('title', 'like', '%' . $request->search . '%')
      ->orWhere('description', 'like', '%' . $request->search . '%')
      ->where('status', config('constant.post_approved'))
      ->where(function ($sub) use ($current_timestamp) {
        $sub->where('public_date', '<=', $current_timestamp)
          ->orWhereNull('public_date');
      })
      ->orderBy('public_date', 'DESC')
      ->paginate(12, ['*']);
  }

  public function countSeach($request)
  {
    $current_timestamp = Carbon::now()->toDateTimeString();
    return $this->_post
      ->orWhere('title', 'like', '%' . $request->search . '%')
      ->orWhere('description', 'like', '%' . $request->search . '%')
      ->where(function ($sub) use ($current_timestamp) {
        $sub->where('public_date', '<=', $current_timestamp)
          ->orWhereNull('public_date');
      })
      ->where('status', config('constant.post_approved'))
      ->count();
  }
}
