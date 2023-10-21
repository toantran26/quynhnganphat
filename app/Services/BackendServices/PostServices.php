<?php


	namespace App\Services\BackendServices;

   use App\Repository\Backend\Contracts\AdminRepositoryInterface as Admin;
   use App\Repository\Backend\Contracts\PostRepositoryInterface as Model;
   use App\Repository\Backend\Contracts\CategoriesRepositoryInterface as ModelCate;
   use App\Repository\Backend\Contracts\UserRepositoryInterface as User;
   use App\Repository\Backend\Contracts\TagsRepositoryInterface as Tag;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

    class PostServices
	{

	    const path_file = 'uploads/posts';
	    protected $_model;
	    protected $_cate;
	    protected $_user;
	    protected $_admin;
	    protected $_tag;

	    public function __construct(Model $model, ModelCate $cate, Admin $admin, Tag $tag)
        {
            $this->_model = $model;
            $this->_admin = $admin;
            $this->_cate = $cate;
            $this->_tag = $tag;
        }

        public function getFormAddPost() {
	        $cate = $this->_cate->getAllCategories();
	        $user =  $this->_admin->getAllAccount();
            
	        return ['cate_list'=>$cate,'user'=>$user];
        }

        public function getFormUpdate($slug,$id) {
            $cate = $this->_cate->getAllCategories();
            $user =  $this->_admin->getAllAccount();
            $post = $this->_model->getDetailPost($slug,$id);
            $post->listTag=  '';
            // dd($user);
            if(count($post->tags) > 0){
                foreach ($post->tags as $tag) {
                    $post->listTag.= $tag->title_vi.',';
                }
            }

            return ['cate_list'=>$cate,'user'=>$user, 'post' => $post,'id'=>$post['id']];
        }

        public function storeBlog(Request $request){
            if($request->avatar) {
                $file = $request->avatar;
                $fileName  = time().$file->getClientOriginalName();
                $file->move(public_path(self::path_file), $fileName);
                $request->path_file_name = '/'.self::path_file.'/'.$fileName;
            }

            if($request->tag) {
                $tags = explode(",", $request->tag);
                $request->listTags = array();
                foreach ($tags as $value) {
                    // dd($this->_tag->getTagByTagName($value)->id);
                    if(!$this->_tag->getTagByTagName($value)) {
                        $this->_tag->tag_name = $value;
                        $id = $this->_tag->save($this->_tag)->id;
                        array_push( $request->listTags, $id);
                    } else {
                        array_push($request->listTags,$this->_tag->getTagByTagName($value)->id);
                    }
                }
            }

            return $this->_model->syncPost($request);
        }

        public function listBlog($status,$request,$paginate=10) {

            if($status == 0 || $status ==3){
                $user_id = Auth::user()->id;
            }else $user_id = 0;
	        return $this->_model->getListPostByStatus($status,$request,$user_id,$paginate);
        }

        public function getDetailPost($slug, $id) {
            return $this->_model->getDetailPost($slug,$id);
        }

        public function getDetailVideo($slug, $id) {
            $video = $this->_model->getDetailPost($slug,$id);
            $listVideoRelation = $this->_model->getListVideoRelation($id);
            $listVideoTop = $this->_model->getListVideoTop($id);

            return ['video' => $video, 'listVideo' => $listVideoRelation, 'topVideo' => $listVideoTop];
        }

        public function listBlogRelation($category_id, $post_id) {
            return $this->_model->getListBlogRelation($category_id, $post_id);
        }

        public function getListPostHome() {
           
            $blogHome = $this->_cate->getDataPostCateHome(2,5); // lấy 5 bài blog

            return ['blogHome' => $blogHome];
        }

        public function update(Request $request) {
            if($request->avatar) {
                $file = $request->avatar;
                $fileName  = time().$file->getClientOriginalName();
                $file->move(public_path(self::path_file), $fileName);
                $request->path_file_name = '/'.self::path_file.'/'.$fileName;
            }

            if($request->tag) {
                $tags = explode(",", $request->tag);
                $request->listTags = array();
                foreach ($tags as $value) {
                    if(!$this->_tag->getTagByTagName($value)) {
                        $this->_tag->tag_name = $value;
                        $id = $this->_tag->save($this->_tag)->id;
                        array_push( $request->listTags, $id);
                    } else {
                        array_push($request->listTags,$this->_tag->getTagByTagName($value)->id);
                    }
                }
            }

            return $this->_model->syncUpdate($request);
        }

        public function getListPostMedia() {
	        $topMedia = $this->_model->getListMediaTop();
            $listVideo = $this->_model->getAllVideoPost();
            $listImage = $this->_model->getAllImagePost();

	        return ['topMedia'=>$topMedia, 'listVideo' =>$listVideo, 'listImage' => $listImage];
        }
        public function postTrash($id){
            $is_trash = $this->_model->syncIsTrash($id);
            return $is_trash;
        }
        public function search($request) {
            
	        return $this->_model->search($request);
        }
        public function countSeach($request) {
            return $this->_model->countSeach($request);
        }
    }
