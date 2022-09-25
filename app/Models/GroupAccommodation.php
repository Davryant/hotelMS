<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupAccommodation extends Model
{
    protected $table = "group_accommodations";
    protected $fillable = ['group_id', 'payment_mode_id', 'number_of_guests', 'room_price_applied', 'check_in_date', 'check_out_date', 'group_status'];
}
