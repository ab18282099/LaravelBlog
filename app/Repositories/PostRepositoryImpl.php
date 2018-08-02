<?php

namespace App\Repositories;

use App\Models\Post;

/**
 * Class PostRepositoryImpl post 資料儲存庫實作
 * @package App\Repositories
 */
class PostRepositoryImpl extends GenericRepositoryImpl implements PostRepository
{
    /**
     * PostRepositoryImpl constructor. 建構子
     * @param Post $post post model
     */
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }
}