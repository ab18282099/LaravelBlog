<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface GenericRepository
{
    /**
     * 取得指定 pk 的實體資料
     * @param $id mixed 指定 pk
     * @return Model
     */
    public function get($id);

    /**
     * 取得所有資料
     * @return Collection|static[]
     */
    public function getAll();

    /**
     * 新增一筆資料
     * @param Model $model 欲新增的實體資料
     * @return bool 是否新增成功
     */
    public function add(Model $model);

    /**
     * 更新一筆資料
     * @param Model $model 欲更新的實體資料
     * @return bool 是否更新成功
     */
    public function update(Model $model);

    /**
     * 刪除一筆資料
     * @param Model $model 欲刪除的實體資料
     * @return bool 是否刪除成功
     */
    public function delete(Model $model);
}