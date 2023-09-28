<?php

namespace App\Modules\User\Model;

use App\Models\BaseModel;

class UserRoles extends BaseModel
{
    protected $fillable = [
        'role_code',
        'user_id',
        'status',
    ];
    protected $guarded = [];

    public array $translatable = [];

    public function users(): object
    {
        return $this->belongsTo(User::class);
    }
}
