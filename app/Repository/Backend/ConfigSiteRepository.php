<?php


namespace App\Repository\Backend;

use App\Models\Category;
use App\Models\Menu;
use App\Repository\Backend\Contracts\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ConfigSiteRepository implements Contracts\ConfigSiteRepositoryInterface
{
  protected $_menu;
  protected $_post;
  protected $_cate;
  public function __construct(Menu $menu, PostRepositoryInterface $post, Category $cate)
  {
    $this->_menu = $menu;
    $this->_post = $post;
    $this->_cate = $cate;
  }

  public function getAllMenuMenu()
  {
    return $this->_menu
      ->with('category')
      ->with('children', function ($query) {
        $query->where('status', 0)
          ->orderBy('position', 'ASC');
      })
      // ->with(implode('.', array_fill(0, 4, 'children')))
      ->where('status', 0)
      ->where('parent_id', '=', null)
      ->orderBy('position', 'ASC')
      ->get();
  }
  public function getAllMenu()
  {
    return   $this->_cate
      ->with('childrenMenu')
      ->where('status', 0)
      ->where('is_trash', 0)
      ->where('parent_id', '=', null)
      ->orderBy('top_cate', 'ASC')
      ->get();
  }

  public function getMenuChangePosition($position)
  {
    return $this->_menu
      ->where('status', 0)
      ->where('position', '>=', $position)
      ->where('parent_id', '=', null)
      ->get();
  }

  public  function  savePosition($menu, $position)
  {
    $menu->position = $position;
    return $menu->save();
  }

  public  function saveMenu($request)
  {
    return  $this->_menu->create([
      'name' => $request->menu_name,
      'name_en' => $request->name_en ?? '',
      'slug' => $request->slug,
      'status' => 0,
      'parent_id' => $request->parent_id ?? null,
      'cate_id' => $request->cate_id,
      'link' => $request->link,
      'position' => $request->position ?? null
    ]);
  }
  public  function updateMenu($request)
  {
    return $this->_menu->where('id', $request->id)
      ->update([
        'name' => $request->menu_name,
        'name_en' => $request->name_en ?? '',
        'slug' => $request->slug,
        'status' => 0,
        'parent_id' => $request->parent_id ?? null,
        'cate_id' => $request->cate_id ?? null,
        'link' => $request->link,
        'position' => $request->position ?? null
      ]);
  }
  public function getOne($id)
  {
    return $this->_menu->find($id);
  }

  public function countPostApproved()
  {
    return \DB::table('posts')->where('status', config('constant.post_approved'))->count();
  }

  public function countPostDraft()
  {
    return \DB::table('posts')->where('user_id', Auth::user()->id)->where('status', config('constant.post_draft'))->count();
  }

  public function countPostWaiting()
  {
    return \DB::table('posts')->where('status', config('constant.post_waiting'))->count();
  }

  public function countPostReject()
  {
    return \DB::table('posts')->where('status', config('constant.post_reject'))->count();
  }

  public function countPostRemove()
  {
    return \DB::table('posts')->where('status', config('constant.post_remove'))->count();
  }

  public function countPostDelete()
  {
    return \DB::table('posts')->where('status', config('constant.post_delete'))->count();
  }

  public function countJobsRemove()
  {
    return \DB::table('jobs')->where('status', config('constant.post_remove'))->count();
  }
  public function countJobsApproved()
  {
    return \DB::table('jobs')->where('status', config('constant.post_approved'))->count();
  }
  public function countCate()
  {
    return \DB::table('categories')->where('status', config('constant.cate_active'))->count();
  }

  // public function countAdmin() {
  //     return \DB::table('users')->where('status', config('constant.account_active'))->count();
  // }

}
