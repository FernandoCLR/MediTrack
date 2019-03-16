
    @extends('layouts.app')
     <style>
     .my{
         padding-left: 2cm;
         padding-right: 2cm;
     }
     .my2{
         padding-left: 1cm;
         padding-top: 5mm;
         padding-bottom: 5mm;
         padding-right: 1cm;
     }
     </style>

    @section('content')
    <br>
        <h3>&nbsp E-Channel Dashboard </h3>
        
        <hr>
        <a class="btn btn-outline-primary float-right" href="/echannel/create" role="button">Create an Appoinment</a>
        <br>
        <br>
        <div class="my">
              
            @if(count($echannel)>0) 
             @foreach($echannel as $post)
             <div class="card text-white bg-info">
                    <div class="my2">
                
                <div class="row">
                <div ><h4>Doctor Name: {{$post->d_name}}</h4></div>
                </div>
                <div class="row"><h5>Specialized Area: &nbsp </h5>{{$post->area}}</div>
                
                <div class="row"><h5>Hospotal:&nbsp</h5>{{$post->hospital}}</div>
              
                <div class="row"><h5>Date of Appointment:&nbsp</h5>{!!$post->date!!}</div>
             
                <div class="row"><h6>Time:&nbsp</h6>{!!$post->time!!}</div>

                <div class="row"><h6>Payments:&nbsp</h6>@if($post->d_amount == null)
                No payments 
                @else 
                Payments Done 
                @endif 
                </div>
               
                @if($post->user_id==auth()->user()->id)
            <div>  <a class="btn btn-success float-right" href="/payments/{{$post->id}}" role="button">Payment</a>
                            <a class="btn btn-primary float-right" href="/events" role="button">Create an Event</a> 
                        {!!Form::open(['action'=>['EchannelingController@destroy',$post->id],'method'=>'POST'])!!}
                            {{Form::hidden('_method','DELETE')}}
                           {{Form::submit('Delete',['class'=>'btn btn-danger float-right'])}}

                        {!!Form::close()!!} 
                         </div>
                        @else 

                        @endif
                    </div>
                </div> 
                <br>  
                @endforeach
                
                @endif
        
        </div>
            
        
    @endsection
    
    