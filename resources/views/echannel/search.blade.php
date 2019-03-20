@extends('layouts.app')

@section('content')
<br>
<div class="card mx-5">
<div class="card-header bg-primary text-light"><h3>Channel Search Results</h3></div><br>
<table border="3" cellpadding="10" align="center">
        <tr>
            <th> Doctor Name</th>
            <th> Specialized Area </th>
            <th> Hospital </th>
            <th> Avilabel Date </th>
            <th> Avilabel Time </th>
            <th> Channel </th>
           
        </tr>
        
         @if (count($result)>0)
            @foreach($result as $data)
              <tr>
              <td>{{$data->d_name}}</td>
              <td>{{$data->area}}</td>
              <td>{{$data->hospital}}</td>
              <td>{{$data->date}}</td>
              <td>{{$data->time}}</td>
              <td><a class="btn btn-outline-success" href="search/conf/{{$data->id}}" role="button">Channel</a> </td>
              
              
              </tr>
            @endforeach
            @endif 
        </table>
</div>
        @endsection