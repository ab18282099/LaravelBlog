<?php

namespace App\Repositories;

/**
 * Interface PostRepository post 資料儲存庫介面
 * @package App\Repositories
 */
interface PostRepository
{
    /**
     * 取得所有 post 資料
     * @return mixed
     */
    public function getAll();
}