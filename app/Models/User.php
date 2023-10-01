<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $primaryKey = 'profile_uid';

    public function profile()
    {
        return $this->hasOne(Profile::class, 'profile_uid','profile_uid');
    }
}
