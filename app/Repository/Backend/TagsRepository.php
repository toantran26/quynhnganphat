<?php


namespace App\Repository\Backend;

use App\Models\Tag;
use PhpParser\Node\Expr\FuncCall;

class TagsRepository implements Contracts\TagsRepositoryInterface
{
    protected $_model;

    public function __construct(Tag $model)
    {
        $this->_model = $model;
    }
    public function getAllTag1()
    {
        return $this->_model->select('id', 'title_vi')->get();
    }

    public function getAllTag($paginate = 5, $keyword = '')
    {
        if ($keyword != '') {
            $this->_model = $this->_model->where('title_vi', 'like', '%' . $keyword . '%')->where('title_en', 'like', '%' . $keyword . '%');
        }
        // dd($this->_model->paginate($paginate, ['*'], 'np'));
        return $this->_model->paginate($paginate, ['*'], 'np');
    }
    // public function getListPostByStatus($status, $paginate = 10)
    // {
    //     return $this->_model
    //         ->where('status', $status)
    //         ->orderBy('created_at', 'DESC')
    //         ->paginate($paginate);
    // }
    public function save($tag)
    {
        $slug = $this->_model->toSlug($tag->tag_name);
        return $this->_model->create([
            'title_vi' => $tag->tag_name,
            'title_en' => $tag->tag_name,
            'slug' => $slug,
            'status' => config('constant.tag_active')
        ]);
    }

    public function getTagByTagName($tagName)
    {
        return $this->_model
            ->where('title_vi', $tagName)
            ->where('status', config('constant.tag_active'))
            ->first();
    }

    public function find(array $array)
    {
        return $this->_model->find($array);
    }
    public function getOne($id){
        return $this->_model->find($id);
    }
}
