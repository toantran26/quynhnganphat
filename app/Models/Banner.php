<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_vi',
        'title_en',
        'order_no',
        'image',
        'image_mobi',
        'is_trash',
        'location',
        'is_page',
        'link',
        'description_vi',
        'description_en',
    ];
    public function getTranslate($record) {
        $locale = App::currentLocale();
        return head($this->only($record.'_'.$locale));
    }

}
