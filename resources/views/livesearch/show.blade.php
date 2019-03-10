
@extends('layouts.app')

@section('content')
<br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(count($users)>0)
                    @foreach($users as $user)
                    <div class="card-header bg-primary text-light"><h2>{{$user->first_name }}'s Basic Details</h2></div><br>
                    <a  class="btn btn-outline-primary" href="/live_search/history/{{$user->user_id}}" role="button">View {{$user->first_name }}'s Timeline</a><br>
                    @if(auth()->user()->access != 3)
                    <a  class="btn btn-outline-success" href="/live_search/history/{{$user->user_id}}/create" role="button">Add New Record {{$user->first_name }}'s Timeline</a><br> 
                    @endif 
                    <div class="card mx-2">
                        <div class="card-header bg-primary text-light">Basic Information</div><br>
                    <ul>
                        <li> <p>Name : {{$user->first_name}} {{$user->second_name}} {{$user->last_name}}</p></li>
                        <li> <p>Date of Birth : {{$user->dob}}</p></li>
                        <li><p>Age : {{$user->age}}</p></li>
                        <li><p>Gender : {{$user->gender}} </p></li>
                        <li><p>NIC Number : {{$user->nic}}</p></li>
                        <li><p>Addess : {{$user->address}}</p></li>
                        <li><p>Mobile Number : {{$user->m_tp_no}}</p></li>
                        <li><p>Land Line Number : {{$user->h_tp_no}}</p></li>
                        <li><p>Email : {{$user->email}}</p></li>
                    </ul>
                    </div>
                    <hr>
                    <div class="card mx-2">
                        <div class="card-header bg-primary text-light">Emergency Situation Information</div><br>
                    <ul>
                        <li><p>Blood Group :{{$user->b_grp}} </p></li>
                        <div class="row">
                            <div class="col">
                                <li><h6>Emergency Contact Number 1</h6>
                                    <ul>
                                    
                                    <li><p>Name : {{$user->emg_one_name}}</p></li>
                                    <li><p>Relation to User : {{$user->emg_one_relationto_user}} </p></li>
                                    <li><p>Contact Number : {{$user->emg_one}}</p></li>
                                </ul></li>
                            </div>
                            <div class="col">
                                    <li><h6>Emergency Contact Number 2</h6>
                                        <ul>
                                            
                                            <li><p>Name : {{$user->emg_two_name}}</p></li>
                                            <li><p>Relation to User : {{$user->emg_two_relationto_user}} </p></li>
                                            <li><p>Contact Number : {{$user->emg_two}}</p></li>
                                    </ul></li>
                            </div>
                        </div>
                        <li><p>Description : {!!$user->description!!} </p></li>
                        
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   @endforeach
   @endif
   
    @endsection