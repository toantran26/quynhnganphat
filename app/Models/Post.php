<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Symfony\Component\DomCrawler\Crawler;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_vi',
        'title_en',
        'description_vi',
        'description_en',
        'content_vi',
        'content_en',
        'slug',
        'avatar',
        'source',
        'pseudonym',
        'public_date',
        'title_seo',
        'key_seo',
        'desc_seo',
        'category_id',
        'user_id',
        'hot_news',
        'top_news',
        'type',
        'status',
        'is_emagazine',
        'views'
    ];
    public function getTranslate($record) {
        $locale = App::currentLocale();
        return head($this->only($record.'_'.$locale));
    }
    public function getMediaVideo($record){
        $locale = App::currentLocale();
        $content = head($this->only($record.'_'.$locale));
        // $html = new Crawler($content);
        // $list_menu_arr[] ='';
        // $html->filter('iframe',0)->each(
        //     function (Crawler $node) use (&$key, &$list_menu_arr, &$count) {
        //         $list_menu = $node->text();
        //         $node->{'id'} = $key;
        //         $list_menu_arr[] = $list_menu;
        //     }
        // );
        preg_match_all('#<iframe[^>]+>.*?</iframe>#is', $content, $matches);
        $firstIframe = $matches[0][0];
        $html = '';
        if ($firstIframe) {
            $url = $this->getUrlIframe($firstIframe);
            $html = '';
            $html .= '<iframe name="ifm_video" id="player" class="video_resize"  ';
            $html .= 'width="100%"';
            $html .= 'height="400px"';
            $html .=  'src="' . $url . '?wmode=opaque&autohide=1&autoplay=1&start=0&enablejsapi=1"';
            $html .= '      frameborder="0" allowfullscreen></iframe>';
        } 
        // else {
        //     $html = $this->getLinkImage($news_id, $width, $height, $oneNews, $class);
        // }
        return $html;

    }
    public function getUrlIframe($iframe)
    {
        preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $iframe, $matches);
        return $matches['1'];
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function admins() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function toSlug($doc) {$str = addslashes(html_entity_decode($doc));$str = str_replace('|', '', $str);$str = $this->toNormal($str);$str = preg_replace('/[^a-zA-Z0-9\/_|+ -]/', '', $str);$str = preg_replace('/( )/', '-', $str);$str = str_replace('--', '-', $str);$str = str_replace('/', '-', $str);$str = str_replace('\/', '', $str);$str = str_replace('+', '', $str);$str = strtolower($str);$str = stripslashes($str);return trim($str, '-');}
    public function toNormal($str) {$str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);$str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);$str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);$str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);$str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);$str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);$str = preg_replace('/(đ)/', 'd', $str);$str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);$str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);$str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);$str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);$str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);$str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);$str = preg_replace('/(Đ)/', 'D', $str);return $str;}
}

