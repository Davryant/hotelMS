<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupStatus extends Model
{
    protected $table = 'group_statuses';
    protected $fillable = ['status_name'];
}
