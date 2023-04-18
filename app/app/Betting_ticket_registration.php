<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Betting_ticket_registration extends Model
{
    protected $fillable =
     [
        'user.id',
        'date', 
        'place',
        'race_name',
        'idevtification',
        'first_num ', 
        'second_num',
        'third_num',
        'amount ', 
        'race_detail_id'
    ];
    protected $dates = ['date'];


    public function Race_detail()
    {
    return $this->hasMany('App\Race_detail','race_detail_id','id');
    }

    public function sum($val)
    {
        return $val->sum();
    }

    public function pow($val)
    {
        return $val->pow();
    }
}
