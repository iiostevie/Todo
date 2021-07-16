<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;




class User extends Authenticatable
{
    use HasFactory;
    protected $fillable=['name', 'email', 'password'];

    // get all of the tasks of the user.
    public function tasks()
    {
        return $this->hasMany(Task::class,"userid","id");
    }
}

