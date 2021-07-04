<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";

    protected $fillable = [
        'ar_name',
        'en_name',
        'ar_description',
        'en_description',
        'photo',
        'day_number',
        'hour_number',
        'price',
        'status',
        'created_at',
        'updated_at',

    ];
    protected $hidden = ['pivot'];
    public $timestamps = true;
}
