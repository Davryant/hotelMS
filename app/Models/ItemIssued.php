<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemIssued extends Model
{
    protected $table = 'item_issueds';

    protected $fillable = [

        'issue_number','item_name','issued_to','issued_comment','issued_by','item_quantity','item_measurement','prepared_no'

    ];
}
