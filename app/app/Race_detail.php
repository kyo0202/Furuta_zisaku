<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race_detail extends Model
{
    protected $fillable = ['date', 'place', 'race_name'];
}