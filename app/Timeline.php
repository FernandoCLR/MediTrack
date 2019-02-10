<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    //Table name
    protected $table = 'timelines';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamp
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
