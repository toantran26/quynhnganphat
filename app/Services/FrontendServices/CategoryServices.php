<?php


namespace App\Services\FrontendServices;

// use App\Models\Post;
use App\Repository\Frontend\Contracts\CategoryRepositoryInterface as Cate;

class CategoryServices
{
  protected $_category;

  public function __construct(Cate $category)
  {
    $this->_category = $category;
  }
  public function listCategoryByParent($id)
  {
    $cate = $this->_category->getListCategoryByParent($id);
    return $cate;
  }
  public function getOne($id){
    return $this->_category->getOne($id);
  }
  public function getInfoCate($slug) {
    return $this->_category->getInfoCate($slug);
  }
}
