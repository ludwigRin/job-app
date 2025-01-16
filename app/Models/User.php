<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    //attributes which are allowed to be mass assigned
    protected $fillable = ['username', 'password'];

    //diable timestamp requirement
    public $timestamps = false;

    // a user has one company (could have more in a real project but i want to keep it simple)
    public function company () {
        return $this->hasOne(Company::class);
    }

    // a user can create many jobs
    public function jobs () {
        return $this->hasMany(Job::class);
    }
}