<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ReceivePayment extends Model
{
    protected $table = "receive_payments";
    protected $fillable = ['customer_id', 'total_dept', 'received_amount', 'balance', 'check_number', 'received_by'];
}
