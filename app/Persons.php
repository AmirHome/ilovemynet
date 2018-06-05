<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon; 



class Persons extends Model {

    
    protected $table    = 'persons';
    
    protected $fillable = [
          'name',
          'birthday',
          'gender'
    ];
    
    public static $gender = ['male' => 'male', 'female' => 'female'];

    
    /**
     * Set attribute to datetime format
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
     * Get attribute from datetime format
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