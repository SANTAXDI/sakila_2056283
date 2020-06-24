<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "country";
    protected $primaryKey = "country_id";
    public $timestamps = false;

    public function cities(){
        return $this->hasMany("App\city","country_id");
    }


}
