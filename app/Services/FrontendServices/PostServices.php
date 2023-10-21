<?php


namespace App\Services\FrontendServices;

// use App\Models\Post;
use App\Repository\Frontend\Contracts\PostRepositoryInterface as Post;

class PostServices
{
  protected $_post;

  public function __construct(Post $_post)
  {
    $this->_post = $_post;
  }

  public function getdetailPost($slug, $id)
  {
    return $this->_post->getdetailPost($slug, $id);
  }

  public function getrelatedPost($cate_id, $id)
  {
    return $this->_post->getrelatedPost($cate_id, $id);
  }

  public function listDataPostCategoryId($id, $limit = 10)
  {
    return $this->_post->getPostCategoryId($id, $limit);
  }
  public function listBlogRelation($category_id, $post_id, $limit = 6)
  {
    return $this->_post->getListBlogRelation($category_id, $post_id, $limit);
  }
  public function getDataLoadMore($cate_id, $page)
  {
    return $this->_post->getDataLoadMore($cate_id, $page);
  }
  public function getDetailPage($slug, $page)
  {
    return $this->_post->getDetailPage($slug, $page);
  }

  public function listProject($cate_id = 2, $limit = 10)
  {
    return $this->_post->getDataPostByCateParent($cate_id, $limit);
  }
  public function listPostParentChillden($cate_id, $limit = 10)
  {
    return $this->_post->getDataPostByCateParent($cate_id, $limit);
  }
  public function dataSearch($request)
  {
    return $this->_post->search($request);
  }
  public function dataLoadSearch($search, $page)
  {
    return $this->_post->getDataLoadMoreSearch($search, $page);
  }
  public function geteCountSearch($request)
  {
    return $this->_post->countSeach($request);
  }
  public function getListPostMedia()
  {
    $listVideo = $this->_post->getAllVideoPost()->appends(request()->except('page'));
    $listImage = $this->_post->getAllImagePost()->appends(request()->except('page'));
    // dd(request()->except('page'));
    return ['listVideo' => $listVideo, 'listImage' => $listImage];
  }
}
