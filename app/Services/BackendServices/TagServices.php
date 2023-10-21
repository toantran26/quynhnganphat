<?php


	namespace App\Services\BackendServices;

   use App\Repository\Backend\Contracts\AdminRepositoryInterface as Admin;
   use App\Repository\Backend\Contracts\TagsRepositoryInterface as Model;
   use App\Repository\Backend\Contracts\PostRepositoryInterface as Post;
    use Illuminate\Http\Request;

    class TagServices
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

    public function getAllTag($paginate, $keword)
    {
        return $this->_model->getAllTag($paginate, $keword);
    }
    public function getOne($id){
        return $this->_model->getOne($id);
    }
       
}
