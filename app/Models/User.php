<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['id', 'name', 'email', 'age'];

    public $timestamps = false;
}