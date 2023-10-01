<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodingSkills extends Model
{
    use HasFactory;
    protected $primaryKey = 'profile_uid';
    protected $fillable = ['skill'];
}
