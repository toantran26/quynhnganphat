<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontendServices\PostServices as Service;
use Carbon\Carbon;

class PostController extends Controller
{
  protected $_services;

  public function __construct(Service $services)
  {
    $this->_services = $services;
  }

  public function index($slug, $id)
  {
    return view('frontend.post');
  }
  public function detail($slug, $id)
  {
    $onePost = $this->_services->getdetailPost($slug, $id);
    if (!$onePost || $onePost->status != 2 || $onePost->public_date > Carbon::now()->toDateTimeString()) return redirect()->route('home-FE');
    $listRelation = $this->_services->listBlogRelation($onePost->category_id, $onePost->id, 6);
    return view('frontend.post.post-detail', compact('onePost', 'listRelation'));
  }
}
