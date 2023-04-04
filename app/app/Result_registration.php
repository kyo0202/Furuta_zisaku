<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result_registration extends Model
{
    protected $fillable = ['date', 'place', 'race_name'];

    public function Result_registration(){
    return $this->belongdTo('App/Race_result', 'race_result_id','id');
    }
}
