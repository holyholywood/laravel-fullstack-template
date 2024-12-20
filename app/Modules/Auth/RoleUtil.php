<?php

namespace App\Modules\Auth;

use Spatie\Permission\Models\Role;

class RoleUtil
{
    private $model;
    public function __construct(Role $model)
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

    public function getWithPermission($id)
    {
        return $this->model->where(['id' => $id])->with(['permissions'])->first();
    }

    public function getOne($id)
    {
        return $this->model->where(['id' => $id])->first();
    }

    public function insert($data)
    {
        $data['name'] = str($data['name'])->snake()->upper();
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $roleName = str($data['name'])->snake()->upper();
        $permissions = $data['permissions'] ?? [];
        $role = $this->model->findById($id);
        $role->syncPermissions($permissions);
        $role->update(['name' => $roleName]);
    }

    public function delete($id)
    {
        $deleted = $this->model->where(['id' => $id])->delete();
    }
}
