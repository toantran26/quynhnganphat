<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Comment extends Model
{
    use HasFactory;

    protected $table= 'comments';
    protected $fillable = [
        'content',
        'customer_id',
        'parent_id',
        'user_id',
        'post_id',
        'like',
        'status'
    ];
    public function getTranslate($record) {
        $locale = App::currentLocale();
        return head($this->only($record.'_'.$locale));
    }
    public function parent() {

        return $this->hasOne(Comment::class, 'id', 'parent_id');
    }

    public function children() {

        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function post() {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function admins() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

}
