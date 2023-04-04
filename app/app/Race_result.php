<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race_result extends Model
{
    protected $fillable = ['first_place', 'second_place','third_place','win','multiple_wins','wide'	,'baren','horse_single','triplets','trio'];

    public function Race_detail()
    {
        return $this->hasOne('App\Race_detail');
    }
}
