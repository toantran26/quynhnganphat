<?php


namespace App\Repository\Frontend;


use App\Repository\Frontend\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
  protected $_category;

  public function __construct(Category $category)
  {
    $this->_category = $category;
  }
  public function getListCategoryByParent($id)
  {
    return $this->_category
      ->where('is_trash', 0)
      ->where('parent_id', '=', $id)
      ->with('posts')
      ->with('parent')
      ->where('status', 0)
      ->get();
  }
  public function getOne($id)
  {
    return $this->_category->find($id);
  }
  public function getInfoCate($slug)
  {
    return $this->_category->where('slug', $slug)->first();
  }
}
