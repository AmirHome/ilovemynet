<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {


    protected $table    = 'address';
    
    protected $fillable = [
          'address',
          'post_code',
          'city_name',
          'country_name'
    ];
    
    
    
}