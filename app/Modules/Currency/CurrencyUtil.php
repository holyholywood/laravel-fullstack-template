<?php

namespace App\Modules\Currency;

use App\Modules\Currency\Model\Currency;

class CurrencyUtil
{
    private $model;
    public function __construct(Currency $model)
    {
        $this->model = $model;
    }

    public function all($paginate = true, $limit = 10)
    {
        if ($paginate) {
            return $this->model->with(['createdBy'])->paginate($limit);
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
