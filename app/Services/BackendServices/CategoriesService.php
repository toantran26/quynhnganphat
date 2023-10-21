<?php


	namespace App\Services\BackendServices;

	use App\Repository\Backend\Contracts\CategoriesRepositoryInterface as Model;
    use Illuminate\Http\Request;



    class CategoriesService
	{
	    protected $_model;

	    public function __construct(Model $model)
        {
            $this->_model = $model;
        }

        public function listCategory(Request $request){
            $keyWord = $request->input('keyword') ?? '';
            $is_trash = 0;
            if($request->is_trash == 1) $is_trash = 1;
	        $categories = $this->_model->getAllCategories($is_trash);
            // $listCategoryParent = $this->_model->getListCategoryParent();
            // dd($categories->toArray());
	        return view('backend.category.index', compact('categories'));
        }
        public function getAllCategories(){
            return $this->_model->getAllCategories();
        }

        public function create(Request $request) {
           if($this->_model->save($request)){
               return redirect()->back()->with('success','Đã thêm 1 chuyên mục mới!');
           } else{
               return redirect()->back()->with('error','Đã có lỗi xảy ra!');
           }

        }

        public function getInfoCate($slug) {
	        return $this->_model->getInfoCate($slug);
        }
        public function getDataPostCate($id,$limit){
            return $this->_model->getDataPostCate($id,$limit);
        }
        public function getDataPostCateRight($id,$limit=5){
            return $this->_model->getDataPostCateRight($id,$limit);
        }
        public function getDataLoadMoreCate($id,$page){
            return $this->_model->getDataLoadMoreCate($id,$page);
        }
        
        public function getLoadMoreRight($id,$page){
            return $this->_model->getDataLoadCateRight($id,$page);
        }

        public function getPostByCate($slug) {
            $allPost = $this->_model->getAllPostCate($slug);
            dd($allPost);
	       $topPost = $this->_model->getPostDataBySlugCate($slug, 7);
	       if (count($topPost->posts) < 1) {
               $topPost = $this->_model->getPostDataBySlugCate($slug, 'not_top');
           }

	       $listAllPost = $this->_model->getPostDataBySlugCate($slug);

	        $topPost->rightTop = array();
	        $topPost->bottomTop = array();
            $rightTop = array();
            $bottomTop = array();

	       for($i = 0; $i < count($topPost->posts); $i++) {
	           if($i == 0) {
                   $topPost->postShow = $topPost->posts[$i];
               }

	           if($i >= 1 && $i <= 2) {
	               array_push($rightTop, $topPost->posts[$i]);
               }

	           if($i >= 3 && $i <= 7) {
                   array_push($bottomTop, $topPost->posts[$i]);
               }
           }

	       $topPost->rightTop = array_merge($topPost->rightTop, $rightTop);
	       $topPost->bottomTop = array_merge($topPost->bottomTop,$bottomTop);

	       $listAllPost->topPost = $topPost;

	       return $listAllPost;
        }
        public function getFormUpdate($id) {
            $category = $this->_model->getOne($id);
            $allCategory =  $this->_model->getDataChill();
            return ['allCategory'=>$allCategory,'category'=>$category];
        }
        public function updateCategory(Request $request){
            
            return $this->_model->syncCategoryUpdate($request);
        }
        public function delete($id){
            return $this->_model->syncDelete($id);
        }
        public function getOne($id){
            return $this->_model->getOne($id);
        }
    }
