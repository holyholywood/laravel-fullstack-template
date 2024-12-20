<?php

namespace App\Modules\Auth;

use Spatie\Permission\Models\Permission;

class Permissionutil
{
    private $model;
    public function __construct(Permission $model)
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

    public function allByRole($roleID)
    {

        return $this->model->where(['role_id' => $roleID])->all();
    }

    public function getOne($id)
    {
        return $this->model->where(['id' => $id])->first();
    }

    public function insert($data)
    {
        $data['name'] = str($data['name'])->upper();
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
