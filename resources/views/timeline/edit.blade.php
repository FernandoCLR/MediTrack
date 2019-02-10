@extends('layouts.app')
<head>
    <style>
        .card {
            padding-right: 3cm;
            padding-left: 3cm;
            padding-top: 2cm;
        }
    </style>    
</head>    
@section('content')
<br>
<div class="card bg-primary text-light">
    <div class="row">
    <div class="col-ms-4"><h3> Edit Timeline Event |</h3></div>
    <div class="col"><h3>| {{$timeline->title}}</h3></div>
    </div>
    <hr>
    {!! Form::open(['action'=> ['TimelineControler@update',$timeline->id], 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title :')}}
            {{Form::text('title',$timeline->title,['class'=>'form-control col-md-6','placeholder'=>'Title'])}}

        </div>
        <div class="form-group">
                {{Form::label('hospital','Hospital :')}}
                {{Form::text('hospital',$timeline->hospital,[ 'class'=>'form-control col-md-6','placeholder'=>'Hospital'])}}
    
          </div>
         <div class="form-group">
                    {{Form::label('body','Description :')}}
                    {{Form::textarea('body',$timeline->body,[ 'id'=>'article-ckeditor','class'=>'form-control ','placeholder'=>'Description'])}}
        
          </div>
          <div class="form-group">
                {{Form::label('treatment','Treatment :')}}
                {{Form::textarea('treatment',$timeline->treatment,[ 'id'=>'article-ckeditor2','class'=>'form-control ','placeholder'=>'Treatment'])}}
    
      </div>
      <div class="form-group">
            {{Form::label('status','Patient status :')}}
            {{Form::text('status',$timeline->status,['class'=>'form-control  col-md-6','placeholder'=>'Patient status'])}}

  </div>
           {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-success'])}} 
    {!! Form::close() !!}  
</div>
@endsection