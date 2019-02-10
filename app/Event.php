<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     //Table name
     protected $table = 'events';
     //Primary Key
     public $primaryKey = 'id';
     //Timestamp
     public $timestamps = true;

    protected $fillable = [
        'event_name','discrption', 'start_date', 'end_date'
    ];

    public function user(){
        return $this->belongsTo('App\User');
     }
}
