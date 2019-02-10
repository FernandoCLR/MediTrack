@extends('layouts.app')
 
 <style>
 .my{
   text-align:center;
 }
 .hp{
   padding-left:25cm;
 }
 
 </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@section('content')
        <div class="container mt-4">
 
            <div class="card border-primary mb-3 ">
 
             <div class="card-heading bg-primary text-white"><h4 class="my">Add MediTrack Calender Event</h4></div>
 
              <div class="card-body">    
 
                   {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                          @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @elseif (Session::has('warnning'))
                              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                          @endif
 
                      </div>
 
                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('event_name','Event Descriptive Title:') !!}
                            <div class="">
                            {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      

                      <div class="col-xs-3 col-sm-3 col-md-3">
                          <div class="form-group">
                            {!! Form::label('start_date','Start Date:') !!}
                            <div class="">
                            {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                          </div>
                        </div>

                      
 
                      <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                          {!! Form::label('end_date','End Date:') !!}
                          <div class="">
                          {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>
 
                      <div class="text-center col-xs-1 col-sm-1 col-md-1 "> &nbsp;<br/>
                      {!! Form::submit('Add Event',['class'=>'btn btn-primary ']) !!}
                      </div>
                    </div>
                   {!! Form::close() !!}
 
             </div>
                
            </div>
            <br>
            <div class="card border-primary mb-3">
              <div class="card-heading bg-primary text-white"><h4 class="my">Calendar</h4></div>
              <div class="card-body" >
                 
                  {!! $calendar_details->calendar() !!}
                  
              </div>
            </div>
 
            </div>
            <script src="http://code.jquery.com/jquery.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

            {!! $calendar_details->script() !!}
          
          
@endsection