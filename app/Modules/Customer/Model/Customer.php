<?php

namespace App\Modules\Customer\Model;

use App\Models\User;
use App\Modules\CustomerIncome\Model\CustomerIncome;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'fullname',
        'email',
        'phone_number',
        'address',
        'id_card_number',
        'id_card_img_url',
        'created_by_id',
        'income_id'
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function income(): BelongsTo
    {
        return $this->belongsTo(CustomerIncome::class, 'income_id', 'id');
    }
}
