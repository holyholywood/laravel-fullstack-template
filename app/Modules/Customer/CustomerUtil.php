<?php

namespace App\Modules\Customer;

use App\Modules\Customer\Model\Customer;
use App\Modules\Media\MediaUtil;
use Illuminate\Support\Facades\Auth;

class CustomerUtil
{
    private $model;
    private $mediaUtil;
    public function __construct(Customer $model, MediaUtil $mediaUtil)
    {
        $this->model = $model;
        $this->mediaUtil = $mediaUtil;
    }

    public function all($paginate = true, $limit = 10)
    {
        if ($paginate) {
            return $this->model->with(['createdBy'])->paginate($limit);
        }
        return $this->model->with(['createdBy'])->all();
    }

    public function getOne($id, $with = [])
    {
        return $this->model->where(['id' => $id])->with($with)->first();
    }

    public function insert($customer)
    {
        $customer['fullname'] = $this->createFullName($customer['first_name'], $customer['middle_name'], $customer['last_name']);
        $customer['created_by_id'] = Auth::user()->id;
        $customer['id_card_img_url'] = $this->processCustomerIDCardImage($customer);
        return $this->model->create($customer);
    }

    public function update($id, $customer)
    {
        $customer['fullname'] = $this->createFullName($customer['first_name'], $customer['middle_name'], $customer['last_name']);
        $customer['id_card_img_url'] = $this->processCustomerIDCardImage($customer);
        unset($customer['id_card_img']);
        $this->model->where(['id' => $id])->update($customer);
        $updated = $this->model->find(['id' => $id])->first();
        return $updated;
    }

    public function delete($id)
    {
        $deleted = $this->model->where(['id' => $id])->delete();
    }

    private function processCustomerIDCardImage($data)
    {
        if (isset($data['id_card_img'])) {
            $file = $data['id_card_img'];

            if (!$file) return null;

            $media = $this->mediaUtil->insert($data, 'id_card_img');
            return $media->url;
        }
        return null;
    }

    private function createFullName($firstName = '', $middleName = '', $lastName = '')
    {
        return "$firstName $middleName $lastName";
    }
}
