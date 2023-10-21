<?php


	namespace App\Services\BackendServices;

   use App\Repository\Backend\Contracts\AdminRepositoryInterface as Admin;
   use App\Repository\Backend\Contracts\PostEditRepositoryInterface as Model;
   use App\Repository\Backend\Contracts\PostRepositoryInterface as Post;
    use Illuminate\Http\Request;

    class PostEditServices
	{

	    
	    protected $_model;
	    protected $_admin;
	    protected $_post;

	    public function __construct(Model $model, Post $post, Admin $admin)
        {
            $this->_model = $model;
            $this->_admin = $admin;
            $this->_post = $post;
        }

    public function getAllPostEdit($paginate, $keword)
    {
        return $this->_model->getAllPostEdit($paginate, $keword);
    }
    public function create($data){
        return $this->_model->save($data);
    }
    public function getOne($id){
        return $this->_model->getOne($id);
    }
    public function getEditByPost($id){
        return $this->_model->getEditByPost($id);
    }
    public function updateTime($post_id){
        return $this->_model->updateTime($post_id);
    }
    public function update($user_id,$post_id){
        return $this->_model->update($user_id,$post_id);
    }
       
}
