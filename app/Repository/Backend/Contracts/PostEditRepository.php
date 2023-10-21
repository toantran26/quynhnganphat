<?php


namespace App\Repository\Backend;

use App\Models\PostEdit as Model;
use Illuminate\Support\Carbon;

use PhpParser\Node\Expr\FuncCall;

class PostEditRepository implements Contracts\PostEditRepositoryInterface
{
    protected $_model;

    public function __construct(Model $model)
    {
        $this->_model = $model;
    }
    public function save($array)
    {
        // $currentDateTime = Carbon::now();
        $newDateTime = Carbon::now()->addMinutes(1);
        // print_r(strtotime($currentDateTime));
        // echo "</br>";
        // print_r(strtotime($newDateTime));
        return $this->_model->create([
            'user_id' => $array['user_id'],
            'post_id' => $array['post_id'],
            'time' => strtotime($newDateTime),
        ]);
    }
    public function  update($user_id,$post_id) {
        $one = $this->_model->where('post_id', $post_id)->first();
        $newDateTime = Carbon::now()->addMinutes(1);
        return  $this->_model->where('post_id', $post_id)->update([
            'user_id' => $user_id ?? $one->user_id,
            'time' => strtotime($newDateTime),
        ]);
    }
    public function  updateTime($post_id) {
        $newDateTime = Carbon::now()->addMinutes(1);
        return  $this->_model->where('post_id', $post_id)->update([
            'time' => strtotime($newDateTime),
        ]);
    }
    public function getEditByPost($post_id)
    {
        return $this->_model->where('post_id', $post_id)->first();
    }
    public function getOne($id){
        return $this->_model->find($id);
    }
}
