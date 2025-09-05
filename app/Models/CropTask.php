<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropTask extends Model
{
    protected $fillable = [
        'image', 'processed_image',  'status', 'user_id'
    ];

}
