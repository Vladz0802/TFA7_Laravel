<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Columns that can be filled in with User::create([...]).
    protected $fillable = ['username', 'full_name', 'avatar'];
}
