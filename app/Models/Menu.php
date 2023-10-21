<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table= 'menu';
    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'cate_id',
        'status',
        'parent_id',
        'link',
        'position'
    ];

    public function parent() {

        return $this->hasOne(Menu::class, 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany(Menu::class, 'parent_id', 'id');

    } 
    public function children2() {

        return $this->children()->with('children2');
    }

    function category() {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
