<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoImage extends Model
{
    protected $table = "video_images";
    protected $fillable = ['firstname', 'lastname', 'phone_number', 'gender', 'location', 'category','status','slug_vid'];

}
