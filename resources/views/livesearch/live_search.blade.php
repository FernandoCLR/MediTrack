
    @extends('layouts.app')
    
  
    @section('content')
    <br>
    <div class="container box">
        <div class="card">
        <div class="card-header bg-primary text-light "><h3 >Meditrack Search</h3></div>
        {!! Form::open(['action'=> 'LiveSearch@action', 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('titlelabel','National Identity Card Number :')}}
            {{Form::text('nic','',['class'=>'form-control col-md-6','placeholder'=>'nic', 'required'])}}

        </div>
        {{Form::submit('Search',['class'=>'btn btn-success'])}} 
        {!! Form::close() !!}
        </div>
    </div>


    @endsection

    
        