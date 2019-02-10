<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EChannel extends Model
{
     //Table name
     protected $table = 'e_channels';
     //Primary Key
     public $primaryKey = 'id';
     //Timestamp
     public $timestamps = true;

     public function user(){
        return $this->belongsTo('App\User');
     }
     public function channel(){
        return $this->hasMany('App\Channel');
    }
    public function area(){
        return $this->hasMany('App\Area');
    }
}
