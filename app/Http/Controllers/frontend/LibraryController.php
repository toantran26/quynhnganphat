<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontendServices\PostServices as Service;
use PhpParser\Node\Expr\FuncCall;

class LibraryController extends Controller
{
  protected $_service;
  protected $_category;

  public function __construct(Service $service)
  {
    $this->_service = $service;
  }

  public function indexImage()
  {
    return view('frontend.library.image');
  }

  public function indexVideo()
  {
    return view('frontend.library.video');
  }

  public function index()
  {

    
    if(request()->except('page')){
      $lastPage = request()->except('page');
      $keyLast = array_keys($lastPage);
      $keyLast = array_pop($keyLast);
    }else{
      $keyLast = null;
    }
    $listlibrary = $this->_service->getListPostMedia();
    // return view('frontend.library.image');
    return view('frontend.library.image', compact('listlibrary','keyLast'));
  }

  public function detailVideo($slug, $id)
  {
    $post = $this->_service->getDetailPost($slug, $id);

    return view('frontend.video_detail', compact('post'));
  }
  public function document()
  {
    $category = $this->_category->getInfoCate('an-pham');
    if ($category) {
      $document = $this->_category->getDataPostCate($category->id, 12);
      return view('frontend.an_pham', compact('category', 'document'));
    } else {
      return redirect()->route('home-FE');
    }
    // $document = $this->_service->getListPostMedia();
  }
}
