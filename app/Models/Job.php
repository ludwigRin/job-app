<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    // a job belongs to one user
    public function user () {
        return $this->belongsTo(User::class);
    }

    // a job belongs to a single company
    public function company () {
        return $this->belongsTo(Company::class);
    }

    // a job can only be of one category (to keep it simple)
    public function category () {
        return $this->belongsTo(Category::class);
    }
}