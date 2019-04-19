@extends('layouts.app')

@section('content')
<br>
<div class="card mx-5">
<div class="card-header bg-primary text-light"><h3>Edit Event</h3></div><br>

   <div class="card-body mx-">
    {!! Form::open(['action'=> ['EventController@update',$editit->id], 'method'=>'POST']) !!}
    <div class="form-group">
            {{Form::label('event_name','Event Name :')}}
            {{Form::text('event_name',$editit->event_name,['class'=>'form-control col-md-6','placeholder'=>'Event Name', 'required'])}}

        </div>
        <div class="form-group">
            {{Form::label('start_date','Start Date:')}}
            {{Form::date('start_date',$editit->start_date,[ 'class'=>'form-control col-md-6','placeholder'=>'Start Date', 'required'])}}

      </div>
      <div class="form-group">
        {{Form::label('end_date','End Date :')}}
        {{Form::date('end_date',$editit->end_date,[ 'class'=>'form-control col-md-6','placeholder'=>'End Date', 'required'])}}

  </div>
        
           {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-success'])}} 
    {!! Form::close() !!}  
</div>
</div>

@endsection 