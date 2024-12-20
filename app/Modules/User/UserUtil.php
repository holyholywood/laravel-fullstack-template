<?php

namespace App\Modules\User;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserUtil
{
    private $model;
    private $roleModel;
    public function __construct(User $model, Role $roleModel)
    {
        $this->model = $model;
        $this->roleModel = $roleModel;
    }

    public function all($paginate = true, $limit = 10)
    {
        if ($paginate) {
            return $this->model->with(['roles'])->paginate($limit);
        }
        return $this->model->with(['roles'])->all();
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
        $updatedUser = $this->model->where(['id' => $id])->first();
        $role = $this->roleModel->where(['id' => $data['role_id']])->first();
        $updatedUser->syncRoles($role);
    }

    public function delete($id)
    {
        $deleted = $this->model->where(['id' => $id])->delete();
    }

    public function makeDefaultProfilePicture($name)
    {
        return "https://placehold.co/200x200?text=" . str($name)->replace(' ', "+");
    }
}
