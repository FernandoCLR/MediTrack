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
    <h3> Create New Timeline Event </h3>
    {!! Form::open(['action'=> 'TimelineControler@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title :')}}
            {{Form::text('title','',['class'=>'form-control col-md-6','placeholder'=>'Title', 'required'])}}

        </div>
        <div class="form-group">
                {{Form::label('hospital','Hospital :')}}
                {{Form::text('hospital','',[ 'class'=>'form-control col-md-6','placeholder'=>'Hospital', 'required'])}}
    
          </div>
         <div class="form-group">
                    {{Form::label('body','Description :')}}
                    {{Form::textarea('body','',[ 'id'=>'article-ckeditor','class'=>'form-control ','placeholder'=>'Description', 'required'])}}
        
          </div>
          <div class="form-group">
                {{Form::label('treatment','Treatment :')}}
                {{Form::textarea('treatment','',[ 'id'=>'article-ckeditor2','class'=>'form-control ','placeholder'=>'Treatment', 'required'])}}
    
      </div>
      <div class="form-group">
            {{Form::label('status','Patient status :')}}
            {{Form::text('status','',['class'=>'form-control  col-md-6','placeholder'=>'Patient status', 'required'])}}

  </div>
  <div class="form-group">
    {{Form::label('file_title','File Title :')}}
    {{Form::text('file_title','',['class'=>'form-control  col-md-6','placeholder'=>'Enter File Name'])}}
  </div>
  <div class="form-group">
    {{Form::file('file_name')}}
  </div>
           
     {{Form::submit('Save',['class'=>'btn btn-success'])}} 
    {!! Form::close() !!}  
</div>
@endsection