<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileEducation extends Model
{
    use HasFactory;
    protected $primaryKey = 'profile_uid';
    protected $fillable = ['degree_name'];
}
