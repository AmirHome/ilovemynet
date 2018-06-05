<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model {

    
    protected $table    = 'addresses';
    
    protected $fillable = [
          'address',
          'post_code',
          'city_name',
          'country_name',
          'persons_id'
    ];
    

    public function persons()
    {
        return $this->hasOne('App\Persons', 'id', 'persons_id');
    }


    
    
    
}