<?php

namespace App\Modules\Media\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $table = 'medias';
    protected $fillable = [
        'url',
        'filename',
        'file_size',
        'file_size_unit',
        'file_extension',
        'description',
        'created_by_id',
    ];

    public function uploadBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }
}
