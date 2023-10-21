<?php


namespace App\Services\BackendServices;

use App\Models\Menu;
use App\Repository\Backend\Contracts\CategoriesRepositoryInterface;
use App\Repository\Backend\Contracts\ConfigSiteRepositoryInterface as Model;
use Illuminate\Http\Request;

class ConfigSiteService
{
  protected $_model;
  protected $_category;

  public function __construct(Model $model, CategoriesRepositoryInterface $category)
  {
    $this->_category = $category;
    $this->_model = $model;
  }

  public function configMenu()
  {
    $menu = $this->_model->getAllMenu();
    $listCategoryParent = $this->_category->getListCategoryParent();
    return view('backend.menu.index', compact('menu', 'listCategoryParent'));
  }
  public function allMenu()
  {
    return $this->_model->getAllMenu();
  }
  public function saveMenu(Request $request)
  {
    // $listMenuChangePosition = $this->_model->getMenuChangePosition($request->position);
    // foreach ($listMenuChangePosition as $key => $value) {
    //     $this->_model->savePosition($value, $value->position + 1);
    // }

    if ($this->_model->saveMenu($request)) {
      return redirect()->back()->with(['success' => 'Thêm mới thành công!']);
    }

    return redirect()->back()->with(['error' => 'Thêm mới thất bại!']);
  }
  public function formEditMenu($id)
  {
    $oneMenu = $this->_model->getOne($id);
    $menu = $this->_model->getAllMenu();
    return view('backend.menu.update', compact('oneMenu', 'menu'));
  }
  public function updateMenu(Request $request)
  {
    $oneMenu = $this->_model->getOne($request->id);
    if (!$oneMenu) return redirect()->back()->with(['error' => 'Sửa menu thất bại!']);
    if ($this->_model->updateMenu($request)) {
      return redirect()->back()->with(['success' => 'Sửa menu thành công!']);
    }

    return redirect()->back()->with(['error' => 'Sửa menu thất bại!']);
  }
  public function updateInfo($request)
  {
    $path_config = storage_path('config.json');
    $info = json_decode(file_get_contents($path_config), true);
    $info["key_seo"] = $request->key_seo ?? $info["key_seo"];
    $info["title_seo"] = $request->title_seo ?? $info["title_seo"];
    $info["desc_seo"] = $request->desc_seo ?? $info["desc_seo"];
    $info["facebook_link"] = $request->facebook_link ?? $info["facebook_link"];
    $info["twitter_link"] = $request->twitter_link ?? $info["twitter_link"];
    $info["google_link"] = $request->google_link ?? $info["google_link"];
    $info["zalo_link"] = $request->zalo_link ?? $info["zalo_link"];
    $info["pinterest_link"] = $request->pinterest_link ?? $info["pinterest_link"];
    $info["youtube_link"] = $request->youtube_link ?? $info["youtube_link"];
    $info["instagram_link"] = $request->instagram_link ?? $info["instagram_link"];
    $info["linkedin_link"] = $request->linkedin_link ?? $info["linkedin_link"];
    $info["ads_cate"] = $request->ads_cate ?? $info["ads_cate"];
    $info["ads_post"] = $request->ads_post ?? $info["ads_post"];
    $info["contact_phone"] = $request->contact_phone ?? $info["contact_phone"];
    $info["contact_address"] = $request->contact_address ?? $info["contact_address"];
    $info["contact_email"] = $request->contact_email ?? $info["contact_email"];
    $info["copy_right"] = $request->copy_right ?? $info["copy_right"];
    $info["en_copy_right"] = $request->en_copy_right ?? $info["en_copy_right"];
    $info["license"] = $request->license ?? $info["license"];
    $info["domain"] = $request->domain ?? $info["domain"];
    $info["en_contact_address"] = $request->en_contact_address ?? $info["en_contact_address"];
    $info["en_license"] = $request->en_license ?? $info["en_license"];

    return file_put_contents(storage_path('config.json'), json_encode($info));
  }
}
