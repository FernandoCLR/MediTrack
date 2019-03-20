
    @extends('layouts.app')
<style>
   .ali{
    padding-left: 2cm;
    padding-right: 2cm;
   }
</style>
    
    @section('content')
    <br><br>
    <div class="card mx-5 w-80">
            <div class="card-header bg-primary text-light text-center"><h2> Online Help </h2></div><br>
        <a class="btn btn-outline-primary float-right" href="/onlinehelp/create" role="button">Ask New Question</a><br>
       <div class="ali">
        @if(count($help)>0)
        @foreach($help as $post)
        <div class="form-group">
        <div class="card  bg-primary text-white">
            <div class="card  bg-dark text-white  ">
             <div class="row"> 
               <div class="col"><h4>{{$post->title}}</h4></div>
               <div class="col "><small>Written on :{{$post->created_at}} by {{$post->user->name}}</small></div>
               </div>       
                        <div ><h5>Question :{!!$post->question!!}</h5></div>
                        <div >
                        @if($post->answer==null)
                        <p> The question haven,t been answerd yet.</p>
                        @else 
                        <div ><h5>Answer :{!!$post->answer!!}</h5></div>
                        @endif
                        </div>
                        <a class="btn btn-outline-success" href="/onlinehelp/{{$post->id}}/edit" role="button">Edit</a>
                        
                     
                         @if($post->user_id==auth()->user()->id)
                         <div>
                        {!!Form::open(['action'=>['onlineHelpController@destroy',$post->id],'method'=>'POST'])!!}
                            {{Form::hidden('_method','DELETE')}}
                           {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right'])}}

                        {!!Form::close()!!} 
                         </div>
                        @else 

                        @endif
                        
        </div>
                     
        </div>
        
        

        </div>
        
        
        
        @endforeach
    @else
        <p> Sorry, No records found. </p>

    @endif
       </div>
    </div>
    </div>
    @endsection
    
    