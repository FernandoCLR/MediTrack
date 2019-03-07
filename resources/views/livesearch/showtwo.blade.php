<head>

    <style>
    .form-group{
    padding-left: 5cm;
    }
    .mess{
        padding-left: 40px;
        padding-top: 10px;
        padding-right: 20px;
    }
    .btn{
        align:padding-left;
    }
    .set{
       padding-left: 15cm;
    }
    </style>
    
    </head>
    
    @extends('layouts.app')
    
    @section('content')
        <h3> Medical Timeline </h3>
        
          
        
@if(count($timeline)>0)

@foreach($timeline as $post)
<div class="form-group">
<div class="card w-75 bg-primary text-white">
    <div class="card  bg-dark text-white mess ">
    
       <div class="row"> 
       <div class="col"><h4>{{$post->title}}</h4></div>
       <div class="col "><small>Written on :{{$post->created_at}} by {{$post->user->name}}</small></div>
               
                
                
            </div>
                <div><h5>Hospital :{{$post->hospital}}</h5></div>
    </div>
       <div class="set"> <small ><a class="text-white" href="/live_search/history/{{$post->id}}/details">View in Detail...</a></small></div>
       <div class="set"> <small ><a class="text-white" href="/live_search/history/{{$post->user_id}}/create" role="button">Add New</a> </small></div> 
    </div>
    <br>
 
</div>
@endforeach
@else
<p> Sorry, No records found. </p>

@endif
@endsection