<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    protected $table = "customer_groups";
    protected $fillable = ['company_name', 'email', 'phone_number', 'address'];
}
