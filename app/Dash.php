<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dash extends Model
{
    //Table name
    protected $table = 'dashes';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamp
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
