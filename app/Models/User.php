<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    // a user has one company (could have more in a real project but i want to keep it simple)
    public function company () {
        return $this->hasOne(Company::class);
    }

    // a user can create many jobs
    public function jobs () {
        return $this->hasMany(Job::class);
    }
}