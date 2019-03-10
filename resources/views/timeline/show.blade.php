@extends('layouts.app')
 <head>
     <style>
         .container{
             padding-top: 1cm;
            
         }
         .my{
             padding-left: 3cm;
             padding-right: 3cm;
         }
     </style>    
 </head>      
@section('content')
<div class="my">
<div class="container">
    <div class="row">
    
    <div class="col"><h4>{{$timeline->title}}</h4></div>
    </div>
    <h5>Hospotal :{{$timeline->hospital}}</h5>
    <hr>
    <small>Written on :{{$timeline->created_at}}</small>
    <br>
    <hr>
    <br>
    <h6>Description :</h6>
    <div>{!!$timeline->body!!}</div>
    <br>
    <h6>Treatment :</h6>
    <div>{!!$timeline->treatment!!}</div>
    <br>
    <h6>Patient status :</h6>
    <div>{{$timeline->status}}</div>
    <br>
    <h6>Attachments :</h6>
    <div>{{$timeline->file_title}}</div>
    <a class="btn btn-outline-primary" href="file/{{$timeline->file_name}}" download="{{$timeline->file_name}}"role="button">Download</a> 
</div> 
<br>
<hr>
<a class="btn btn-outline-primary" href="/timeline" role="button">Back to Timeline</a> 
@if(auth()->user()->access == 1)
<a class="btn btn-outline-success" href="/timeline/{{$timeline->id}}/edit" role="button">Edit</a> 

{!!Form::open(['action'=>['TimelineControler@destroy',$timeline->id],'method'=>'POST','class'=>'float-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger '])}}

{!!Form::close()!!}
@else 
@endif
</div>
@endsection