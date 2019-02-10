<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //Table name
    protected $table = 'channels';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamp
    public $timestamps = true;
    
    public function echannel(){
        return $this->hasMany('App\EChannel');
    }
    public function area(){
        return $this->hasMany('App\Area');
    }
}
