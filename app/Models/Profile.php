<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profiles";
    protected $primaryKey = 'profile_uid';

    public function user()
    {
        return $this->belongsTo('App\Models\User','profile_uid');
    }
}
