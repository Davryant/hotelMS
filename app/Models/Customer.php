<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['firstname', 'lastname', 'email', 'phone_number', 'gender', 'country', 'customer_type', 'idtype', 'id_number', 'acc_status'];
}
