@extends('layouts.app')

@section('content')
<br>
<div class="card mx-5">
<div class="card-header bg-primary text-light"><h3>Events Edit Mode</h3></div><br>
<table border="3" cellpadding="10" align="center">
    <tr>
        <th> Event</th>
        <th> Start Date </th>
        <th> End Date  </th>
        <th> Edit  </th>
        <th> Delete  </th>
        
    </tr>
    
     @if (count($events)>0)
        @foreach($events as $data)
          <tr>
          <td>{{$data->event_name}}</td>
          <td>{{$data->start_date}}</td>
          <td>{{$data->end_date}}</td>
          <td><a class="btn btn-outline-success" href="{{$data->id}}/edit" role="button">Edit</a> </td>
            <td>{!!Form::open(['action'=>['EventController@destroy',$data->id],'method'=>'POST'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger '])}}
                
                {!!Form::close()!!} </td>
      
      </tr>
        @endforeach
        @endif 
    </table>
    <br>
</div>
    @endsection 