<?php


namespace App\Repository\Backend;

use App\Models\Jobs as Model;
use Illuminate\Support\Carbon;


class JobsRepository implements Contracts\JobsRepositoryInterface
{
  protected $_model;

  public function __construct(Model $model)
  {
    $this->_model = $model;
  }

  public function syncJobs($request)
  {
    try {
      $jobs = $this->save($request);
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }

  public function save($request)
  {
    return $this->_model->create([
      'title_vi' => $request->title_vi,
      'title_en' => $request->title_en ?? null,
      'position_vi' => $request->position_vi,
      'position_en' => $request->position_en ?? null,
      'content_vi' => $request->content_vi,
      'content_en' => $request->content_en ?? null,
      'offer' => $request->offer,
      'slug'  => $request->slug,
      'avatar' => $request->path_file_name ?? null,
      'icon_avatar' => $request->path_file_icon_avatar ?? null,
      'amount' => $request->amount ?? 1,
      'title_seo' => $request->title_seo ?? null,
      'key_seo' => $request->key_seo ?? null,
      'desc_seo' => $request->desc_seo ?? null,
      'author_id' => $request->author_id ?? null,
      'status' => $request->status,
    ]);
  }

  public function syncUpdate($request)
  {
    try {
      $jobs = $this->_model->find($request->id);
      $this->update($request, $jobs);
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }
  public function syncIsTrash($id)
  {
    try {
      $jobs = $this->_model->find($id);
      if (!$jobs) return false;
      $this->_model->where('id', $jobs->id)->update(['status' => config('constant.post_remove')]);
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }

  public function update($request, $jobs)
  {
    return $this->_model
      ->where('id', $request->id)
      ->update([
        'title_vi' => $request->title_vi,
        'title_en' => $request->title_en ?? null,
        'position_vi' => $request->position_vi,
        'position_en' => $request->position_en ?? null,
        'content_vi' => $request->content_vi,
        'content_en' => $request->content_en ?? null,
        'offer' => $request->offer,
        'slug'  => $request->slug ?? $jobs->slug,
        'avatar' => $request->path_file_name ?? $jobs->avatar,
        'icon_avatar' => $request->path_file_icon_avatar ?? $jobs->icon_avatar,
        'amount' => $request->amount ?? 1,
        'title_seo' => $request->title_seo ?? null,
        'key_seo' => $request->key_seo ?? null,
        'desc_seo' => $request->desc_seo ?? null,
        'author_id' => $request->author_id ?? null,
        'status' => $request->status,
        'updated_at' => Carbon::now(),
      ]);
  }
  public function getDetailJobs($slug, $id)
  {
    return $this->_model
      ->where('slug', $slug)
      ->where('id', $id)
      ->first();
  }
  public function getListJobs($status = 2, $request, $paginate = 10)
  {
    $modelJobs = $this->_model->where('status', $status);
    if ($request->keyword) {
      $modelJobs = $modelJobs->where(function ($query) use ($request) {
        return $query->where('title_vi', 'like', '%' . $request->keyword . '%')
          ->orWhere('position_vi', 'like', '%' . $request->keyword . '%');
      });
    }
    return $modelJobs
      ->orderBy('created_at', 'DESC')
      ->paginate($paginate);
  }
  public function getListJobsShows($paginate = 10)
  {
    return $this->_model->where('status', 2)
      ->orderBy('created_at', 'DESC')
      ->paginate($paginate);
  }
  public function getlistJobsRelation($jobs_id, $paginate = 4)
  {
    return $this->_model
      ->where('id', '!=', $jobs_id)
      ->where('status', config('constant.post_approved'))
      // ->orderBy('created_at', 'DESC')
      ->inRandomOrder()
      ->paginate($paginate);
  }
  public function search($request)
  {
    return $this->_model
      ->orWhere('title_vi', 'like', '%' . $request->search . '%')
      ->orWhere('title_en', 'like', '%' . $request->search . '%')
      ->orWhere('position_vi', 'like', '%' . $request->search . '%')
      ->orWhere('position_en', 'like', '%' . $request->search . '%')
      ->where('status', config('constant.post_approved'))
      ->paginate(12, ['*']);
  }
}
