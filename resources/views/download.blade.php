@extends('layouts.app')
@section('content')
<br>
<div class="card mx-5">

    <div class="card-header bg-primary text-light"><h3>Download MediTrack App</h3></div><br>
    <div class="card-body "><p> With the vision of increaing the accessability and avalability to 
        the system now users have the Meditrack App, which can be download using follwing link. 
    </p>
    <br>
    <p><b><i>Avalable only for devices run with Android Operating System.</i></b></p>

    <a class="btn btn-outline-primary" href="{{URL::asset('storage/file/MediTrack.apk')}}" download="MediTrack.apk" role="button">Download</a> 

   

</div><br>
@endsection