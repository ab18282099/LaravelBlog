<?php

namespace App\Repositories;

use App\Repositories\Models\User;

/**
 * 使用者資料儲存庫
 * @package App\Repositories
 */
class UserRepositoryImpl extends GenericRepositoryImpl implements UserRepository
{

    /**
     * 建構子
     * @param User $user 使用者資料表
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}