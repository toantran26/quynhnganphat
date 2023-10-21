<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Management extends Model
{
    use HasFactory;
    protected $table= 'managements';
    protected $fillable = [
        'name_vi',
        'name_en',
        'position_vi',
        'position_en',
        'avatar',
        'order_no',
    ];
    public function getTranslate($record) {
        $locale = App::currentLocale();
        return head($this->only($record.'_'.$locale));
    }
}
