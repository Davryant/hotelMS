<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserver extends Model
{
    protected $table = "reservers";
    protected $fillable = ['reserver_firstname', 'reserver_lastname', 'reserver_phone_number', 'reserver_gender'];
}
