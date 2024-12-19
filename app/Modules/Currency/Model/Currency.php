<?php

namespace App\Modules\Currency\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Currency extends Model
{
    protected $fillable = [
        'name',
        'abbr',
        'code',
        'region',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_by_id = Auth::id();
        });
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }
}
