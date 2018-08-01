<?php

namespace App\Repositories;

use App\Models\Post;

/**
 * Class PostRepositoryImpl post 資料儲存庫實作
 * @package App\Repositories
 */
class PostRepositoryImpl implements PostRepository
{
    /**
     * @var Post post model
     */
    private $post;

    /**
     * PostRepositoryImpl constructor. 建構子
     * @param Post $post post model
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * 取得所有 post 資料
     * @return Post[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAll()
    {
        return $this->post::all();
    }
}