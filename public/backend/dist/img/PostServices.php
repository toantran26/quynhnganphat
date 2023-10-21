<?php


namespace App\Services\BackendServices;

use App\Models\Category;
use App\Models\Post;
use App\Repository\Backend\Contracts\AdminRepositoryInterface as Admin;
use App\Repository\Backend\Contracts\PostRepositoryInterface as Model;
use App\Repository\Backend\Contracts\CategoriesRepositoryInterface as ModelCate;
use App\Repository\Backend\Contracts\TagsRepositoryInterface as Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

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

  public function getFormAddPost()
  {
    $cate = $this->_cate->getAllCategories();
    $user =  $this->_admin->getAllAccount();

    return ['cate_list' => $cate, 'user' => $user];
  }

  public function getFormUpdate($id)
  {
    $cate = $this->_cate->getAllCategories();
    $user =  $this->_admin->getAllAccount();
    $post = $this->_model->getOne($id);
    if ($post) {
      $post->listTag =  '';
      if (count($post->tags) > 0) {
        foreach ($post->tags as $tag) {
          $post->listTag .= $tag->title . ',';
        }
      }
      $postListCategory = array();
      if (count($post->category) > 0) {
        foreach ($post->category as $oneCate) {
          array_push($postListCategory, $oneCate->id);
        }
      }
      return ['cate_list' => $cate, 'user' => $user, 'post' => $post, 'id' => $post['id'], 'postListCategory' => $postListCategory];
    } else {
      return false;
    }
  }

  public function storeBlog(Request $request)
  {
    if ($request->avatar) {
      $file = $request->avatar;
      $originalFileName = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $fileName = time() . '-' . Str::slug(pathinfo($originalFileName, PATHINFO_FILENAME)) . '.' . $extension;
      $file->move(public_path(self::path_file), $fileName);
      $request->path_file_name = '/' . self::path_file . '/' . $fileName;
    }

    if ($request->tag) {
      $tags = explode(",", $request->tag);
      $request->listTags = array();
      foreach ($tags as $value) {
        // dd($this->_tag->getTagByTagName($value)->id);
        if (!$this->_tag->getTagByTagName($value)) {
          $this->_tag->tag_name = $value;
          $id = $this->_tag->save($this->_tag)->id;
          array_push($request->listTags, $id);
        } else {
          array_push($request->listTags, $this->_tag->getTagByTagName($value)->id);
        }
      }
    }
    if ($request->category_path) {
      $request->listCategory = $request->category_path;
    }
    if ($request->top_news == 'on') {
      $listPostTop = $this->_model->getPostTop(5);
      if (count($listPostTop) >= 5) {
        if ($listPostTop->first()->id) $this->_model->removeTopNews($listPostTop->first()->id);
      }
      $request->order_top = 1;
    }

    return $this->_model->syncPost($request);
  }

  public function listBlog($status, $request, $paginate = 10, $type = false)
  {
    $user_id = 0;
    $request->me_cat_path = array();

    if ($type) {
      $me = Auth::user();
      if ($status == 0 || $status == 3) {
        $user_id = $me->id;
      }
      if ($me->permission_category_2) {
        // if($status==0 || $status==3) $me_cat_path = json_decode($me->permission_category_3,true);
        if ($status == 1) $request->me_cat_path = json_decode($me->permission_category_2, true);
      }
    }

    return $this->_model->getListPostByStatus($status, $request, $user_id, $paginate);
  }

  public function getListPostSeach($status, $request, $paginate = 10)
  {
    return $this->_model->getListPostSeach($status, $request, $paginate);
  }

  public function getDetailPost($slug, $id)
  {
    return $this->_model->getDetailPost($slug, $id);
  }
  public function getOne($id)
  {
    return $this->_model->getOne($id);
  }
  public function update(Request $request)
  {


    $onePost = $this->_model->getOne($request->id);
    if ($request->avatar) {
      $file = $request->avatar;
      $originalFileName = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $fileName = time() . '-' . Str::slug(pathinfo($originalFileName, PATHINFO_FILENAME)) . '.' . $extension;
      $file->move(public_path(self::path_file), $fileName);
      $request->path_file_name = '/' . self::path_file . '/' . $fileName;
    }

    if ($request->tag) {
      $tags = explode(",", $request->tag);
      $request->listTags = array();
      foreach ($tags as $value) {
        if (!$this->_tag->getTagByTagName($value)) {
          $this->_tag->tag_name = $value;
          $id = $this->_tag->save($this->_tag)->id;
          array_push($request->listTags, $id);
        } else {
          array_push($request->listTags, $this->_tag->getTagByTagName($value)->id);
        }
      }
    }
    $me = Auth::user();
    $request->last_edit = $me->id;
    if ($request->category_path) {
      $request->listCategory = $request->category_path;
    }
    if ($request->top_news == 'on') {
      if ($onePost->top_news != 1) {
        $listPostTop = $this->_model->getPostTop(6);
        if (count($listPostTop) >= 6) {
          if ($listPostTop->first()->id) $this->_model->removeTopNews($listPostTop->first()->id);
        }
        $request->order_top = 1;
      }
    }
    return $this->_model->syncUpdate($request);
  }
  public function updateSeo($id, $arr = null)
  {
    return $this->_model->updateOne($id, $arr);
  }
  public function upTopHot($id, $arr = null)
  {
    $this->_model->updateOrderTop();

    return $this->_model->updateOne($id, $arr);
  }
  public function listPostTop($limit)
  {
    return $this->_model->getPostTop($limit);
  }


  public function postTrash($id)
  {
    $is_trash = $this->_model->syncIsTrash($id);
    return $is_trash;
  }
  public function postDistroy($id)
  {
    $is_trash = $this->_model->syncDistroy($id);
    return $is_trash;
  }
  public function search($request)
  {

    return $this->_model->search($request);
  }
  public function countSeach($request)
  {
    return $this->_model->countSeach($request);
  }
  public function getPermissionEdit($oneItem, $me)
  {
    $status = $oneItem->status;
    if ($status == 0 || $status == 3) {
      if ($oneItem->user_id == $me->id) return true;
      elseif ($status == 0 && $oneItem->push_user) return true;
      else return false;
    } elseif ($status == 1) $category_path = $me->permission_category_2;
    elseif ($status == 2 || $status == 4 || $status == 6) $category_path = $me->permission_category_1;
    else return false;
    #
    $user_category = json_decode($category_path, true);
    if (!$user_category) return false;

    $list_category = array();
    foreach ($oneItem->category as $oneCate) {
      $list_category[] = $oneCate->id;
    }
    if (!array_diff($list_category, $user_category)) return true;
    else return false;
  }
  public function getDataTop($element = 'views', $paginate = 30, $order = 'DESC')
  {
    return $this->_model->getDataTop($element, $paginate, $order);
  }
  public function checkSeo($oneItem, $id = null)
  {
    #Điểm SEO
    $total_SEO = 100;
    $total_checkSEO = 0;

    $html = new Crawler($oneItem->content);
    if ($oneItem['desc_seo']) {
      $meta_description_title = mb_strtolower($oneItem['desc_seo'], 'UTF-8');
    } else {
      $meta_description_title = mb_strtolower($oneItem['description'], 'UTF-8');
    }

    $title_strtolower = $oneItem['title_seo'] ? mb_strtolower($oneItem['title_seo'], 'UTF-8') : mb_strtolower($oneItem['title'], 'UTF-8');
    $len_title = mb_strlen($title_strtolower, 'UTF-8');
    // tách từ khóa chính trong chuỗi
    $arr_key_seo = explode(',', $oneItem['key_seo']);
    $keyword_seo = $arr_key_seo[0];
    // từ khóa chính
    $one_key_tag = trim(mb_strtolower($keyword_seo, 'UTF-8'));
    if ($keyword_seo != '') {
      $arr_key_tag =  explode(' ', $one_key_tag);
      $count_key_tag = count($arr_key_tag);
    } else {
      $count_key_tag = 0;
    }
    $assign_list["count_key_tag"] = $count_key_tag;

    if ($count_key_tag >= 3) {
      $total_checkSEO = $total_checkSEO + 5;
    }

    if ($len_title < 40 || $len_title > 65) {
      $title_err = 1;
    } else {
      $title_err = 0;
      $total_checkSEO = $total_checkSEO + 10;
    }
    $assign_list["title_err"] = $title_err;
    $assign_list["len_title"] = $len_title;
    // từ khóa bên phải title
    $left_title = substr($title_strtolower, 0, $len_title / 2 + 15);
    $pos_title = @strpos($left_title, $one_key_tag);
    if ($one_key_tag && ($pos_title > 0 || $pos_title === 0)) {
      $total_checkSEO = $total_checkSEO + 5;
      $err_lftitle = 0;
    } else {
      $err_lftitle = 1;
    }
    $assign_list["err_lftitle"] = $err_lftitle;
    $show = '';
    // từ khóa trong mô tả
    $len_meta_description = mb_strlen($meta_description_title, 'UTF-8');
    if ($len_meta_description < 120 || $len_meta_description > 165) {
      $meta_des_err = 1;
    } else {
      $meta_des_err = 0;
      $total_checkSEO = $total_checkSEO + 10;
    }
    $assign_list["meta_des_err"] = $meta_des_err;
    $assign_list["len_meta_description"] = $len_meta_description;

    $pos_intro = @strpos($meta_description_title, $one_key_tag);
    if ($one_key_tag && ($pos_intro > 0 || $pos_intro === 0)) {
      $total_checkSEO = $total_checkSEO + 10;
      $err_intro = 0;
      $show .= '<p><b>Intro (Mô tả): </b> <b class="bluec">OK</b> </p>';
    } else {
      $err_intro = 1;
    }
    $assign_list["err_intro"] = $err_intro;

    $left_intro = substr($meta_description_title, 0, $len_meta_description / 2);
    $pos_left_intro = @strpos($left_intro, $one_key_tag);
    if ($one_key_tag && ($pos_left_intro > 0 || $pos_left_intro === 0)) {
      $total_checkSEO = $total_checkSEO + 5;
      $err_lfintro = 0;
    } else {
      $err_lfintro = 1;
    }
    $assign_list["err_lfintro"] = $err_lfintro;
    // url chứa từ khóa chính
    $pos_url = @strpos($title_strtolower, $one_key_tag);

    if (isset($_GET['test'])) {
      echo $title_strtolower . '-' . $one_key_tag . '+' . $pos_url;
      die("-1");
    }
    if ($one_key_tag && ($pos_url > 0 || $pos_url === 0)) {
      $total_checkSEO = $total_checkSEO + 15;
      $url = 1;
      $show .= '<p><b>Title: </b> <b class="bluec">OK</b> </p><p><b>URL Title: </b> <b class="bluec">OK</b> </p>';
    } else {
      $url = 0;
    }
    $assign_list["url"] = $url;

    // từ khóa phụ
    $tag_path =  explode(',', $oneItem['key_sub_tag']);
    $cout_path = count($tag_path);

    // images
    // $alt_seo = '';
    // $html->filter('img')->each(

    //   function (Crawler $node) use (&$key, &$src_seo, &$alt_seo) {

    //     $src_seo = $node->attr('src');
    //     $alt_seo = $node->attr('alt');
    //     $node->{'id'} = $key;
    //     if ($alt_seo && $alt_seo != 'Empty') {
    //       $alt_seo = 1;
    //     } else {
    //       $alt_seo = 0;
    //       $assign_list["alt_img_err"] = $key;
    //       return $assign_list["alt_img_err"];
    //     }
    //   }
    // );
    // $assign_list["alt_seo"] = $alt_seo;
    // if ($alt_seo == 1) {
    //   $total_checkSEO = $total_checkSEO + 5;
    // }
    // content
    $content_seo = strip_tags($oneItem['content']);
    $content_seo_str = mb_strtolower($content_seo, 'UTF-8');
    $content_seo_str_nohtml = str_replace('&amp;', '&', $content_seo_str);
    $text_content = explode(' ', $content_seo);
    $count_content = count($text_content);
    if ($one_key_tag) {
      $count_key_tag_in_content = substr_count($content_seo_str_nohtml, $one_key_tag);
    } else {
      $count_key_tag_in_content = 0;
    }
    if ($count_key_tag_in_content < 3) {
      $in_content_err = 1;
    } else {
      $in_content_err = 0;
      $total_checkSEO = $total_checkSEO + 10;
    }

    if ($count_key_tag_in_content > 0) {
      $show .= '<p><b>Content: </b> <b class="bluec">xuất hiện ' . $count_key_tag_in_content . ' lần</b> </p>';
    }
    $assign_list["count_key_tag_in_content"] = $count_key_tag_in_content;

    // $matdo_key_tag_S = round((($count_key_tag_in_content*$count_key_tag)/$count_content)*100, 2);

    // tiêu đề phụ
    $err_tit_sub = '';
    if ($one_key_tag) {
      $html->filter('h3')->each(
        function (Crawler $node) use (&$key, &$one_key_tag, &$err_tit_sub) {
          $txt_sub = $node->text();
          $txt_title_sub = mb_strtolower($txt_sub, 'UTF-8');
          $pos_tit_sub  = strpos($txt_title_sub, $one_key_tag);

          if ($pos_tit_sub != false || $pos_tit_sub === 0) {
            $err_tit_sub = -1;
            return $err_tit_sub;
          } else {
            $err_tit_sub = 1;
          }
        }
      );
    }

    if ($err_tit_sub == -1) {
      $total_checkSEO = $total_checkSEO + 5;
      $show .= '<p><b>Tiêu đề phụ: </b> <b class="bluec">OK</b> </p>';
    }
    $assign_list["err_tit_sub"] = $err_tit_sub;

    // link nội bộ
    $h = 0;
    $html->filter('a')->each(
      function (Crawler $node) use (&$key, &$src_seo, &$h) {
        $href_t = $node->attr('href');
        $href_do = 'motgame.vn';
        $pos_link = strpos($href_t, $href_do);

        if ($pos_link > 0 || $pos_link === 0) {
          $h = $h + 1;
        }
      }
    );
    $assign_list["h"] = $h;

    if ($h > 0) {
      $total_checkSEO = $total_checkSEO + 10;
      $err_link = 0;
    } else {
      $err_link = 1;
    }
    $assign_list["err_link"] = $err_link;

    // check heading
    $count_h2 = 0;
    $count_h3 = 0;
    $html->filter('h2')->each(
      function (Crawler $node) use (&$key, &$list_menu_arr, &$count_h2) {
        $count_h2++;
      }
    );
    $html->filter('h3')->each(
      function (Crawler $node) use (&$key, &$list_menu_arr, &$count_h3) {
        $count_h3++;
      }
    );
    if ($count_h2 > 0 && $count_h3 > 0) {
      $total_checkSEO = $total_checkSEO + 10;
      $err_heading = 0;
    } else {
      $err_heading = 1;
    }
    $assign_list["err_heading"] = $err_heading;
    $assign_list["count_h2"] = $count_h2;
    $assign_list["count_h3"] = $count_h3;

    $assign_list["total_SEO"] = $total_SEO;
    $assign_list["total_checkSEO"] = $total_checkSEO;
    $assign_list["show"] = $show;
    $assign_list["keyword_seo"] = $keyword_seo;

    if ($this->updateSeo($id, ['total_seo' => $total_checkSEO])) {
      return $assign_list;
    } else {
      echo "Lỗi update điểm SEO!";
      die();
    }
    // endSeo
  }
}
