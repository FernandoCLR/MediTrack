@extends('layouts.app')

@section('content')
<br>
@if(auth()->user()->access == 2)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-light"><h3>MediTrack Dashboard</h3></div><br>
                
                     <h4> You are loged in Hospital Account </h4>
                    
                </div>
        </div>
    </div>
</div>
@else 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-light"><h3>MediTrack Dashboard</h3></div><br>
                @if(count($dashes)>0)
                    @foreach ($dashes as $post)
                    <div class="card mx-2">
                        <div class="card-header bg-primary text-light">Basic Information</div><br>
                    <ul>
                        <li> <p>Name : {{$post->first_name}} {{$post->second_name}} {{$post->last_name}}</p></li>
                        <li> <p>Date of Birth : {{$post->dob}}</p></li>
                        <li><p>Age : {{$post->age}}</p></li>
                        <li><p>Gender : {{$post->gender}} </p></li>
                        <li><p>NIC Number : {{$post->nic}}</p></li>
                        <li><p>Addess : {{$post->address}}</p></li>
                        <li><p>Mobile Number : {{$post->m_tp_no}}</p></li>
                        <li><p>Land Line Number : {{$post->h_tp_no}}</p></li>
                        <li><p>Email : {{$post->email}}</p></li>
                    </ul>
                    </div>
                    <hr>
                    <div class="card mx-2">
                        <div class="card-header bg-primary text-light">Emergency Situation Information</div><br>
                    <ul>
                        <li><p>Blood Group :{{$post->b_grp}} </p></li>
                        <div class="row">
                            <div class="col">
                                <li><h6>Emergency Contact Number 1</h6>
                                    <ul>
                                    
                                    <li><p>Name : {{$post->emg_one_name}}</p></li>
                                    <li><p>Relation to User : {{$post->emg_one_relationto_user}} </p></li>
                                    <li><p>Contact Number : {{$post->emg_one}}</p></li>
                                </ul></li>
                            </div>
                            <div class="col">
                                    <li><h6>Emergency Contact Number 2</h6>
                                        <ul>
                                            
                                            <li><p>Name : {{$post->emg_two_name}}</p></li>
                                            <li><p>Relation to User : {{$post->emg_two_relationto_user}} </p></li>
                                            <li><p>Contact Number : {{$post->emg_two}}</p></li>
                                    </ul></li>
                            </div>
                        </div>
                        <li><p>Description : {!!$post->description!!} </p></li>
                    </ul>
                    </div>
                    @if($post->user_id==auth()->user()->id)
                    <a class="btn btn-outline-success" href="/home/{{$post->id}}/edit" role="button">Edit</a> 
                    @else 
                    @endif
                    @endforeach
                
            @else
            
                @if(auth()->user()->id == TRUE)
                <p> Sorry, No records found. Add your details up here. </p>
                <a class="btn btn-outline-primary float-right" href="/home/create" role="button">Add Information</a>
                
                @else 
                <p> Sorry, No records found. Add your details up here. </p>
                @endif
               
            
            @endif
                </div>
        </div>
    </div>
</div>


@endif                     
@endsection
