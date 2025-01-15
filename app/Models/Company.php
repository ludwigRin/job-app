<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    // a company belongs to one user
    public function user () {
        return $this->belongsTo(User::class);
    }

    // a company can have multiple jobs
    public function jobs () {
        return $this->hasMany(Job::class);
    }
}
