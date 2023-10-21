<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\FrontendServices\CategoryServices as Cate;
use App\Services\FrontendServices\PostServices as Post;
use App\Services\FrontendServices\ManagementServices as Management;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
  protected $_post;
  protected $_cate;
  protected $_management;

  public function __construct(Post $post, Cate $category, Management $management)
  {
    $this->_post = $post;
    $this->_cate = $category;
    $this->_management = $management;
  }


  public function index($slug)
  {
  }
  public function blog_news()
  {

    if ($category = $this->_cate->getInfoCate('tin-tuc')) {
      $parent_id = $category->parent->id;
      $listPost = $this->_post->listDataPostCategoryId($category->id, 6);
      return view('frontend.category.blog_news', compact('category', 'listPost'));
    }
    return redirect()->route('home-FE');
  }
  public function introduce()
  {
    $category = $this->_cate->getInfoCate('gioi-thieu');
    $listProject = $this->_post->listProject();
    $listManagement = $this->_management->listAllManagement();
    return view('frontend.category.gioi_thieu', compact('category','listManagement', 'listProject'));
  }
  public function project($slug)
  {
    if ($category = $this->_cate->getInfoCate($slug)) {
      $parent_id = $category->parent->id;
      $listPost = $this->_post->listDataPostCategoryId($category->id, 6);
      if ($parent_id == 2) {
        return view('frontend.category.project', compact('category', 'listPost'));
      }
      return redirect()->route('home-FE');
    }
    // return view('frontend.project');
  }
  public function document()
  {
    $category = $this->_cate->getInfoCate('an-pham');
    if ($category) {
      $listDocument = $this->_post->listDataPostCategoryId($category->id, 12);
      return view('frontend.category.document', compact('category', 'listDocument'));
    } else {
      return redirect()->route('home-FE');
    }
  }

  public function loadMoreRight()
  {
    $page = intval($_GET['page_r']);
    $category_id = intval($_GET['category_id']);
    $type = intval($_GET['type']);
    if ($type == 1) {
      $listPostRight = $this->_service->getLoadMoreRight($category_id, $page);
    } else {
      $listPostRight = $this->_service->getDataLoadMoreCate($category_id, $page);
    }

    // dd($listPostRight);
    return view('frontend.ajax.views_cate_right', compact('listPostRight'));
  }
  public function partner($slug)
  {
    if ($category = $this->_service->getInfoCate($slug)) {
      $post = $this->_service->getPostByCate($slug);
      return view('frontend.detail-cate', compact('post', 'category'));
    } else {
      return redirect()->route('home-FE');
    }
  }
}
