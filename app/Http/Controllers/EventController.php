<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Calendar;
use Auth;
use Validator;
use App\Event;
 

class EventController extends Controller
{
    public function index(){
        $user_id=auth()->user()->id;
    	$events = Event::get()->where('user_id',$user_id);
    	$event_list = [];
    	foreach ($events as $key => $event) {
    		$event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
            );
    	}
    	$calendar_details  = Calendar::addEvents($event_list); 
 
        return view('events')->with ('calendar_details',$calendar_details);
    }
    public function addEvents(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
 
        if ($validator->fails()) {
        	\Session::flash('warnning','Please enter the valid details');
            return Redirect::to('/events')->withInput()->withErrors($validator);
        }
 
        $event = new Event;
        $event->event_name = $request['event_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event -> user_id = auth()->user()->id;
        $event->save();
 
        \Session::flash('success','Event added successfully.');
        return Redirect::to('/events');
    }
}
