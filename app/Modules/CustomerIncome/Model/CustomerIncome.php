<?php

namespace App\Modules\CustomerIncome\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerIncome extends Model
{
    protected $fillable = [
        'name',
        'start_amount',
        'end_amount',
    ];

    protected $casts = [
        'start_amount' => 'decimal:2',
        'end_amount' => 'decimal:2',
    ];
}
