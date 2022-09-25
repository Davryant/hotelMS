<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CustomerBill extends Model
{
    protected $table = "customer_bills";
    protected $fillable = ['customer_id', 'bill_from', 'amount', 'created_by'];
}
