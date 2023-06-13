<?php

namespace App\Helper;
use Spatie\Permission\Models\Role;
trait BaseQuery
{
    /**
     * add new record
     */
    public function add($model, $data)
    {
        return $model->create($data);
    }

    /**
     * get all record
     */
    public function get_all($model)
    {
        return $model->all();
    }
    public function get_all_users($model)
    {
        $role = Role::where('name', 'user')->first();
        return $model->role($role)->get();
    }

    /**
     * get record by its id
     */
    public function get_by_id($model, $id)
    {
        return $model->findOrFail($id);
    }

    /**
     * get record by column
     */
    public function get_by_column($model, $column, $value)
    {
        return $model->where($column, $value)->get();
    }

    /**
     * delete record by its id
     */
    public function delete($model, $id)
    {
        return $model->findOrFail($id)->delete();
    }
}
