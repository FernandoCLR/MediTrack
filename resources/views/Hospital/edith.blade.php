@extends('layouts.app')

@section('content')
<br>
<div class="card bg-primary text-light">
        <div class="row">
        <div class="col"><h3> Edit Channel</h3></div>
        </div>
        <hr>
        {!! Form::open(['action'=> ['HospitalController@update',$editit->id], 'method'=>'POST']) !!}
        <div class="form-group">
                {{Form::label('d_name','Enter Doctor Name :')}}
                {{Form::text('d_name',$editit->d_name,['class'=>'form-control col-md-6','placeholder'=>'Doctor Name'])}}
    
            </div>
            <div class="form-group">
                {{Form::label('area','Area Specialized In :')}}
                {{Form::text('area',$editit->area,[ 'class'=>'form-control col-md-6','placeholder'=>'Specialized Area'])}}
    
          </div>
          <div class="form-group">
            {{Form::label('hospital','Enter Channeling Hospital :')}}
            {{Form::text('hospital',$editit->hospital,[ 'class'=>'form-control col-md-6','placeholder'=>'Channeling Hospital'])}}
    
      </div>
            <div class="form-group">
                    {{Form::label('date','Select Availabe Date:')}}
                    {{Form::date('date',$editit->date,[ 'class'=>'form-control col-md-6','placeholder'=>'Date'])}}
        
              </div>
              <div class="form-group">
                {{Form::label('time','Select Availabe Time:')}}
                {{Form::time('time',$editit->time,[ 'class'=>'form-control col-md-6','placeholder'=>'Time'])}}
    
          </div>
               {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save',['class'=>'btn btn-success'])}} 
        {!! Form::close() !!}  
    </div>

    @endsection 