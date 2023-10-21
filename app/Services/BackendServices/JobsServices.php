<?php


	namespace App\Services\BackendServices;

   use App\Repository\Backend\Contracts\AdminRepositoryInterface as Admin;
   use App\Repository\Backend\Contracts\JobsRepositoryInterface as Model;
   use App\Repository\Backend\Contracts\UserRepositoryInterface as User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

    class JobsServices
	{

	    const path_file = 'uploads/jobs';
	    protected $_model;
	    protected $_user;
	    protected $_admin;

	    public function __construct(Model $model, Admin $admin)
        {
            $this->_model = $model;
            $this->_admin = $admin;
        }

        public function getFormAddJobs() {
	        $user =  $this->_admin->getAllAccount();
            
	        return ['user'=>$user];
        }

        public function getFormUpdate($slug,$id) {
            $jobs = $this->_model->getDetailJobs($slug,$id);
            return ['jobs' => $jobs,'id'=>$jobs['id']];
        }

        public function storeJobs(Request $request){
            if($request->avatar) {
                $file = $request->avatar;
                $fileName  = time().$file->getClientOriginalName();
                $file->move(public_path(self::path_file), $fileName);
                $request->path_file_name = '/'.self::path_file.'/'.$fileName;
            }
            if($request->icon_avatar) {
                $file = $request->icon_avatar;
                $fileName  = time().$file->getClientOriginalName();
                $file->move(public_path(self::path_file), $fileName);
                $request->path_file_icon_avatar = '/'.self::path_file.'/'.$fileName;
            }

            return $this->_model->syncJobs($request);
        }

        public function listJobs($status=2,$request,$limit = 10) {
	        return $this->_model->getListJobs($status,$request,$limit);
        }
        public function listJobsShows($limit = 10) {
	        return $this->_model->getListJobsShows($limit);
        }
        public function getDetailJobs($slug, $id) {
            return $this->_model->getDetailJobs($slug,$id);
        }
        public function update(Request $request) {
            if($request->avatar) {
                $file = $request->avatar;
                $fileName  = time().$file->getClientOriginalName();
                $file->move(public_path(self::path_file), $fileName);
                $request->path_file_name = '/'.self::path_file.'/'.$fileName;
            }
            if($request->icon_avatar) {
                $file = $request->icon_avatar;
                $fileName  = time().$file->getClientOriginalName();
                $file->move(public_path(self::path_file), $fileName);
                $request->path_file_icon_avatar = '/'.self::path_file.'/'.$fileName;
            }

            return $this->_model->syncUpdate($request);
        }
        public function postTrash($id){
            $is_trash = $this->_model->syncIsTrash($id);
            return $is_trash;
        }
        public function listJobsRelation($jobs_id,$page) {
            return $this->_model->getlistJobsRelation($jobs_id,$page);
        }
        public function search($request) {
	        return $this->_model->search($request);
        }
    }
