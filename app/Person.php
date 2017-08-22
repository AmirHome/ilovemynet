<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 



class Person extends Model {

    

    

    protected $table    = 'person';
    
    protected $fillable = [
          'name',
          'birthday',
          'gender',
          'address_id'
    ];
    
    public static $gender = ["male" => "male", "female" => "female", ];

    
    public function address()
    {
        return $this->hasOne('App\Address', 'id', 'address_id');
    }


    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBirthdayAttribute($input)
    {
        if($input != '') {
            $this->attributes['birthday'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        }else{
            $this->attributes['birthday'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBirthdayAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        }else{
            return '';
        }
    }


    
}