<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccomodationDetail extends Model
{
    protected $table = "accomodation_details";
    protected $fillable = [ 'group_id', 'payment_mode_id', 'room_category_id', 'room_id','customer_id', 'reserver_id', 'room_price_applied', 'advanced_payment', 'check_in_date', 'check_out_date', 'recept_no','no_days'];
}
