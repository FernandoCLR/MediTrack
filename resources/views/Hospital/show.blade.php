
@extends('layouts.app')
@section('content')
<br>
<div class="card mx-5">

    <div class="card-header bg-primary text-light"><h3>MediTrack User Channel</h3></div><br>
    
    <br>
    
    <table border="3" cellpadding="10" align="center">
    <tr>
        <th> Patiant Name</th>
        <th> Channeled Doctor Name </th>
        <th> Hospital </th>
        <th> Requested Area </th>
        <th> Requested Date </th>
        <th> Requested Time </th>
        <th> Payment Status</th>
        
    </tr>
    
     @if (count($username)>0)
        @foreach($username as $data)
          <tr>
          <td>{{$data->user_name}}</td>
          <td>{{$data->d_name}}</td>
          <td>{{$data->hospital}}</td>
          <td>{{$data->area}}</td>
          <td>{{$data->date}}</td>
          <td>{{$data->time}}</td>
          <td>@if($data->d_amount == null)
                No payments 
                @else 
                Payments Done 
                @endif 
          
          </tr>
        @endforeach
        @endif 
    </table>
    <br>
    @endsection