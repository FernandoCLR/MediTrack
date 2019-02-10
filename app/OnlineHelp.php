<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineHelp extends Model
{
     //Table name
     protected $table = 'online_helps';
     //Primary Key
     public $primaryKey = 'id';
     //Timestamp
     public $timestamps = true;

     public function user(){
        return $this->belongsTo('App\User');
    }
}
