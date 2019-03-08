@extends('layouts.app')

@section('content')
<br>
<a class="btn btn-outline-primary float-right" href="/hospital/create" role="button">Add New Channel</a>
<br>

<table border="3" cellpadding="10" align="center">
<tr>
    <th> Doctor Name</th>
    <th> Specialized Area </th>
    <th> Hospital </th>
    <th> Avilabel Date </th>
    <th> Avilabel Time </th>
    <th> Edit Channel </th>
    <th> Delete Channel </th>
</tr>
<
 @if (count($mas)>0)
    @foreach($mas as $data)
      <tr>
      <td>{{$data->d_name}}</td>
      <td>{{$data->area}}</td>
      <td>{{$data->hospital}}</td>
      <td>{{$data->date}}</td>
      <td>{{$data->time}}</td>
      <td><a class="btn btn-outline-success" href="/hospital/{{$data->id}}/edit" role="button">Edit</a> </td>
      <td>{!!Form::open(['action'=>['HospitalController@destroy',$data->id],'method'=>'POST'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger '])}}
        
        {!!Form::close()!!} </td>
      
      </tr>
    @endforeach
</table>
@endif 



@endsection