<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GenericRepositoryImpl
 * @package App\Repositories
 */
class GenericRepositoryImpl implements GenericRepository
{
    /**
     * @var Model 泛型資料模型
     */
    private $model;

    /**
     * GenericRepositoryImpl constructor. 建構子
     * @param Model $model 欲操作的實際資料模型
     */
    protected function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * 取得指定 pk 的實體資料
     * @param $id mixed 指定 pk
     * @return Model
     */
    public function get($id)
    {
        $builder = $this->model->newQuery();

        return $builder->whereKey($id)->first();
    }

    /**
     * 取得所有資料
     * @return mixed 於資料表中的所有資料集合
     */
    public function getAll()
    {
        return $this->model::all();
    }

    /**
     * 新增一筆資料
     * @param Model $model
     * @return bool 是否新增成功
     */
    public function add(Model $model)
    {
        return $model->save();
    }

    /**
     * 更新一筆資料
     * @param Model $model 欲更新的實體資料
     * @return bool 是否更新成功
     */
    public function update(Model $model)
    {
        return $model->save();
    }

    /**
     * 刪除一筆資料
     * @param Model $model 欲刪除的實體資料
     * @return bool 是否刪除成功
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        try
        {
            return $model->delete();
        }
        catch (\Exception $exception)
        {
            throw new \Exception('Model throw exception : ' . $exception->getMessage());
        }
    }
}