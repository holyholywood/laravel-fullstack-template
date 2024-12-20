<?php

namespace App\Modules\Profile;

use App\Models\User;
use App\Modules\Media\MediaUtil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ProfileUtil
{
    private $model;
    private $mediaUtil;
    public function __construct(User $model, MediaUtil $mediaUtil)
    {
        $this->model = $model;
        $this->mediaUtil = $mediaUtil;
    }

    public function getOne()
    {
        $id = Auth::id();
        return $this->model->where(['id' => $id])->with(['roles'])->first();
    }

    public function insert($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        if ($id != Auth::id()) {
            throw new UnauthorizedHttpException("Can't edit profile");
        }

        if (isset($data['new_password'])) {
            $data['password'] = Hash::make($data['new_password']);
        }
        if (isset($data['profile_picture'])) {
            $data['profile_picture'] = $this->mediaUtil->save($data, 'profile_picture')['url'];
        }

        unset($data['new_password']);
        unset($data['new_password_confirmation']);
        return $this->model->where(['id' => $id])->update($data);
    }

    public function delete($id)
    {
        $deleted = $this->model->where(['id' => $id])->delete();
    }
}
