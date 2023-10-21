<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use Illuminate\Support\Facades\DB;
use App\Services\BackendServices\JobsServices;

class JobsController extends Controller
{
  protected $_service;

  public function __construct(JobsServices $service)
  {
    $this->_service = $service;
  }

  public function index()
  {

    $listJobs = $this->_service->listJobsShows();
    return view('frontend.recruit.index', compact('listJobs'));
  }

  public function detail($slug, $id)
  {
    $oneJobs = $this->_service->getDetailJobs($slug, $id);
    if ($oneJobs) {
      $listJobs = $this->_service->listJobsRelation($id, 2);
      // $postRelation = $this->_services->listBlogRelation($post->category->id, $id);
      return view('frontend.recruit.detail', compact('oneJobs', 'listJobs'));
    } else {
      return redirect()->route('home-FE');
    }
  }
}
