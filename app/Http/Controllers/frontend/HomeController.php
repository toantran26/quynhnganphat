<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Services\FrontendServices\PostServices as Post;
use App\Services\FrontendServices\CategoryServices as Cate;
use App\Services\BackendServices\ContactServices as Contact;
use App\Services\BackendServices\ClientServices;
use App\Services\BackendServices\BannerServices;

use Validator;

class HomeController extends Controller
{
  protected $_post;
  protected $_cate;
  protected $_contact;
  protected $_partner;
  protected $_banner;

  public function __construct(Post $post, Cate $category, Contact $contact, ClientServices $client, BannerServices $banner)
  {
    $this->_post = $post;
    $this->_cate = $category;
    $this->_contact = $contact;
    $this->_partner = $client;
    $this->_banner = $banner;
  }

  public function index()
  {

    $category = $this->_cate->getInfoCate('blog');
    $listPostBlog = $this->_post->listPostParentChillden($category->id, 3);
    $listPartner = $this->_partner->getAllClientAccount(12, '');
    $banners = $this->_banner->getAllBannerShow();
    return view('frontend.home', compact('listPostBlog', 'listPartner', 'banners'));
  }

  public function search(Request $request)
  {


    $listSearch = $this->_post->dataSearch($request);
    $countKeySeach = $this->_post->geteCountSearch($request);

    return view('frontend.search', compact('listSearch', 'countKeySeach'));
  }

  public function changeLanguage($language)
  {
    $languageList = ['vi', 'en'];
    if (in_array($language, $languageList)) {
      session(['locale' => $language]);
      App::setLocale($language);

      return redirect()->back();
    }

    return redirect()->route('home-FE');
  }

  public function loadMore()
  {
    $page = @$_GET['page_r'];
    $keySearch = @$_GET['page_r'];

    $listSearch = $this->_post->dataLoadSearch($keySearch, $page);
    return view('frontend.ajax.loadSearch', compact('listSearch'));
  }

  public function subInformation(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'fullname' => 'required|max:255',
      'email' => 'required|email',
      'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      'address' => 'required|max:255',
    ]);
    if ($validator->passes()) {
      if ($this->_contact->storeContact($request)) {
        return json_encode(['success' => 'Thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất!']);
      }
    }
    return response()->json(['error' => $validator->errors()->all()]);
  }
}
