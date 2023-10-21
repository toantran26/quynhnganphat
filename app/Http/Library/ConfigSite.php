<?php


namespace App\Http\Library;

use Illuminate\Support\Facades\App;

class ConfigSite
{
  protected $_model;

  public function listMenu()
  {
    $this->_model = \App::make('App\Repository\Backend\Contracts\ConfigSiteRepositoryInterface');
    return $this->_model->getAllMenu();
  }

  public function count()
  {
    $this->_model = \App::make('App\Repository\Backend\Contracts\ConfigSiteRepositoryInterface');
    $countPostApproved = $this->_model->countPostApproved();
    $countPostReject = $this->_model->countPostReject();
    $countPostWaiting = $this->_model->countPostWaiting();
    $countPostDraft = $this->_model->countPostDraft();
    $countPostDelete = $this->_model->countPostDelete();
    $countPostRemove = $this->_model->countPostRemove();
    $countJobsApproved = $this->_model->countJobsApproved();
    $countJobsRemove = $this->_model->countJobsRemove();
    $countCategory = $this->_model->countCate();
    // $countAdmin = $this->_model->countAdmin();

    return [
      'countPostApproved' => $countPostApproved,
      'countPostDraft' => $countPostDraft,
      'countPostWaiting' => $countPostWaiting,
      'countPostReject' => $countPostReject,
      'countPostDelete' => $countPostDelete,
      'countPostRemove' => $countPostRemove,
      'countCategory' => $countCategory,
      'countJobsApproved' => $countJobsApproved,
      'countJobsRemove' => $countJobsRemove,
      // 'countAdmin' => $countAdmin
    ];
  }
  public function getInfoByName($record)
  {
    $path_config = storage_path('config.json');
    $info = json_decode(file_get_contents($path_config), true);

    return $info[$record];
  }
  function get_current_weekday()
  {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date("l");
    $weekday = strtolower($weekday);
    switch ($weekday) {
      case 'monday':
        $weekday = 'Thứ hai';
        break;
      case 'tuesday':
        $weekday = 'Thứ ba';
        break;
      case 'wednesday':
        $weekday = 'Thứ tư';
        break;
      case 'thursday':
        $weekday = 'Thứ năm';
        break;
      case 'friday':
        $weekday = 'Thứ sáu';
        break;
      case 'saturday':
        $weekday = 'Thứ bảy';
        break;
      default:
        $weekday = 'Chủ nhật';
        break;
    }
    return $weekday . ':' . date(' g:i a');
  }
}
