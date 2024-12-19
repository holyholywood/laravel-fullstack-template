<?php

namespace App\Modules\User;

use App\Models\User;

class UserUtil
{
    private $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all($paginate = true, $limit = 10)
    {
        if ($paginate) {
            return $this->model->paginate($limit);
        }
        return $this->model->all();
    }

    public function getOne($id)
    {
        return $this->model->where(['id' => $id])->first();
    }

    public function insert($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $updated = $this->model->where(['id' => $id])->update($data);
    }

    public function delete($id)
    {
        $deleted = $this->model->where(['id' => $id])->delete();
    }
}
