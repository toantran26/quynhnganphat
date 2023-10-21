<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory;

    protected $table= 'categories';
    protected $fillable = [
        'title_vi',
        'title_en',
        'key_seo',
        'title_seo',
        'desc_seo',
        'is_trash',
        'parent_id',
        'top_cate',
        'slug'
    ];
    public function getTranslate($record) {
        $locale = App::currentLocale();
        return head($this->only($record.'_'.$locale));
    }
    public function parent() {

        return $this->hasOne(Category::class, 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany(Category::class, 'parent_id', 'id')->where('is_trash',0);

    }
    public function children2()
    {
        return $this->children()->with('children2')->where('is_trash',0);
    }
    // public function parent(){
    //     return $this->belongsTo(Category::class, 'parent_id');
    // }

    public function menu() {
        return $this->hasOne(Menu::class,'id','cate_id');
    }
    public function childrenMenu()
    {
      return $this->hasMany(Category::class, 'parent_id', 'id')->where('is_trash', 0)->where('status', 0)
        ->orderBy('top_cate', 'ASC');
    }
  

    public function posts() {
        return $this->hasMany(Post::class);
    }
    public function toSlug($doc) {$str = addslashes(html_entity_decode($doc));$str = str_replace('|', '', $str);$str = $this->toNormal($str);$str = preg_replace('/[^a-zA-Z0-9\/_|+ -]/', '', $str);$str = preg_replace('/( )/', '-', $str);$str = str_replace('--', '-', $str);$str = str_replace('/', '-', $str);$str = str_replace('\/', '', $str);$str = str_replace('+', '', $str);$str = strtolower($str);$str = stripslashes($str);return trim($str, '-');}
    public function toNormal($str) {$str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);$str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);$str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);$str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);$str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);$str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);$str = preg_replace('/(đ)/', 'd', $str);$str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);$str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);$str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);$str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);$str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);$str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);$str = preg_replace('/(Đ)/', 'D', $str);return $str;}
}
