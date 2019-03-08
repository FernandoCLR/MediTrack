@extends('layouts.app')

@section('content')
 <br>
 <div class="card bg-primary text-light">
    <h3> &nbsp Create New Channel For your Hospital </h3>
    {!! Form::open(['action'=> 'HospitalController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('d_name','Enter Doctor Name :')}}
            {{Form::text('d_name','',['class'=>'form-control col-md-6','placeholder'=>'Doctor Name'])}}

        </div>
        <div class="form-group">
            {{Form::label('area','Area Specialized In :')}}
            {{Form::text('area','',[ 'class'=>'form-control col-md-6','placeholder'=>'Specialized Area'])}}

      </div>
      <div class="form-group">
        {{Form::label('hospital','Enter Channeling Hospital :')}}
        {{Form::text('hospital','',[ 'class'=>'form-control col-md-6','placeholder'=>'Channeling Hospital'])}}

  </div>
        <div class="form-group">
                {{Form::label('date','Select Availabe Date:')}}
                {{Form::date('date','',[ 'class'=>'form-control col-md-6','placeholder'=>'Date'])}}
    
          </div>
          <div class="form-group">
            {{Form::label('time','Select Availabe Time:')}}
            {{Form::time('time','',[ 'class'=>'form-control col-md-6','placeholder'=>'Time'])}}

      </div>
            {{Form::submit('Save',['class'=>'btn btn-success'])}} 
    {!! Form::close() !!}  
</div>



@endsection