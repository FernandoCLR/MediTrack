@extends('layouts.app')

@section('content')
<br>
<div class="card mx-5">
<div class="card-header bg-primary text-light"><h3>Search Results</h3></div><br>
<table border="3" cellpadding="10" align="center">
        <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>NIC</th>
                <th>Bood Group</th>
                <th>Mobile Number</th>
                <th>More</th>
        </tr>
        @if(count($result)>0)
            @foreach($result as  $row)
            <tr >
                    <td>{{$row->first_name}}</td>
                    <td>{{$row->second_name}}</td>
                    <td>{{$row->last_name}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->nic}}</td>
                    <td>{{$row->b_grp}}</td>
                    <td>{{$row->m_tp_no}}</td>
                    <td><a href="/live_search/{{$row->user_id}}">View More..</a></td>
            </tr>
         @endforeach
        @endif
    </table>
</div>
        @endsection