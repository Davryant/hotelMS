<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleFeature extends Model
{
    
    protected $table = 'module_features';

    protected $fillable = [

        'module_id','feature_id'

    ];
}
