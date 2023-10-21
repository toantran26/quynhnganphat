<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_vi',
        'name_en',
        'avatar',
        'link',
        'width',
        'height',
    ];
    public function getTranslate($record) {
        $locale = App::currentLocale();
        return head($this->only($record.'_'.$locale));
    }
}
