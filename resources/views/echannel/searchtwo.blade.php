@extends('layouts.app')
<style>
    
</style>

@section('content')
<br>
<div class="card mx-5">
<div class="card-header bg-primary text-light"><h3>Confirm Channel</h3></div><br>
<div class="card-body mx-5">

{!! Form::open(['action'=> 'EchannelingController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('d_name','Doctor Name :')}}
            {{Form::text('d_name',$output->d_name,['class'=>'form-control col-md-6','placeholder'=>''])}}

        </div>
        <div class="form-group">
            {{Form::label('area','Area Specialized In :')}}
            {{Form::text('area',$output->area,[ 'class'=>'form-control col-md-6','placeholder'=>''])}}

      </div>
      <div class="form-group">
        {{Form::label('hospital','Enter Channeling Hospital :')}}
        {{Form::text('hospital',$output->hospital,[ 'class'=>'form-control col-md-6','placeholder'=>''])}}

  </div>
        <div class="form-group">
                {{Form::label('date','Select Availabe Date:')}}
                {{Form::date('date',$output->date,[ 'class'=>'form-control col-md-6','placeholder'=>''])}}
    
          </div>
          <div class="form-group">
            {{Form::label('time','Select Availabe Time:')}}
            {{Form::time('time',$output->time,[ 'class'=>'form-control col-md-6','placeholder'=>''])}}

      </div>
            {{Form::submit('Confirm Channel',['class'=>'btn btn-success'])}} 
    {!! Form::close() !!}  
</div>
</div>
    @endsection