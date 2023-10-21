<?php


	namespace App\Services\BackendServices;

   use App\Repository\Backend\Contracts\AdminRepositoryInterface as Admin;
   use App\Repository\Backend\Contracts\PageRepositoryInterface as Model;
   use App\Repository\Backend\Contracts\UserRepositoryInterface as User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

    class PageServices
	{

	    const path_file = 'uploads/pages';
	    protected $_model;
	    protected $_user;
	    protected $_admin;

	    public function __construct(Model $model, Admin $admin)
        {
            $this->_model = $model;
            $this->_admin = $admin;
        }

        public function getFormAddPage() {
	        $user =  $this->_admin->getAllAccount();
            
	        return ['user'=>$user];
        }

        public function storePage(Request $request){
            if($request->avatar) {
                $file = $request->avatar;
                $fileName  = time().$file->getClientOriginalName();
                $file->move(public_path(self::path_file), $fileName);
                $request->path_file_name = '/'.self::path_file.'/'.$fileName;
            }
            $request->author_id = Auth::user()->id;
            return $this->_model->syncPage($request);
        }

        public function listPage(Request $request) {
	        return $this->_model->getListPage($request);
        }

        public function getDetailPage($id) {
            return $this->_model->getDetailPage($id);
        }
        public function update(Request $request) {
            if($request->avatar) {
                $file = $request->avatar;
                $fileName  = time().$file->getClientOriginalName();
                $file->move(public_path(self::path_file), $fileName);
                $request->path_file_name = '/'.self::path_file.'/'.$fileName;
            }
            return $this->_model->syncUpdate($request);
        }
        public function postTrash($id){
            $is_trash = $this->_model->syncIsTrash($id);
            return $is_trash;
        }
        public function search($request) {
	        return $this->_model->search($request);
        }
    }
