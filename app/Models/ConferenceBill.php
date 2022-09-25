<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceBill extends Model
{
    protected $table = "conference_customers";
    protected $fillable = ['firstname', 'lastname', 'email', 'phone_number', 'gender', 'country', 'idtype', 'id_number', 'status','datein','dateout','payment_id','conference_id','amount_paid','slug_c'];

}
