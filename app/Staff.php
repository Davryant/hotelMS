<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "staff";

    protected $fillable =  [
        'fullname','email','password','gender','phone_number','role_id'
    ];
}
