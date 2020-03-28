<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Teacher extends Model
{
    use HasRoles;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'business_phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
