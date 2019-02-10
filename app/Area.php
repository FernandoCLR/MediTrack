<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
     //Table name
     protected $table = 'areas';
     //Primary Key
     public $primaryKey = 'id';
     //Timestamp
     public $timestamps = true;
     
     public function echannel(){
         return $this->hasMany('App\EChannel');
     }
         public function channel(){
            return $this->hasMany('App\Channel');
     }
}
