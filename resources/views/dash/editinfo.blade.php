@extends('layouts.app')
 
@section('content')
<h1>Edit Your Details.</h1>
{!! Form::open(['action'=> ['DashController@update',$dashes->id], 'method'=>'POST']) !!}
<div class="form-group">
<div class="row">
<div class="col">    

    {{Form::label('first_name','First Name :')}}
    {{Form::text('first_name',$dashes->first_name,['class'=>'form-control','placeholder'=>'First Name'])}}


</div>
<div class="col">

        {{Form::label('second_name','Second Name :')}}
        {{Form::text('second_name',$dashes->second_name,[ 'class'=>'form-control','placeholder'=>'Second Name'])}}

  
</div>
<div class="col">
  
        {{Form::label('last_name','Last Name :')}}
        {{Form::text('last_name',$dashes->last_name,[ 'class'=>'form-control ','placeholder'=>'Last Name'])}}

  
</div>
</div>
</div>
 <div class="form-group">
     <div class="row">
         <div class="col">
            {{Form::label('dob','Date of Birth :')}}
            {{Form::date('dob',$dashes->dob,[ 'class'=>'form-control ','placeholder'=>'Date of Birth'])}}
         </div>
         <div class="col">
            {{Form::label('age','Age :')}}
            {{Form::number('age',$dashes->age,[ 'class'=>'form-control col-2','placeholder'=>'Age'])}}
         </div>
     </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-3">
        {{Form::label('gender','Gender :')}}<br>
        {{Form::label('gender','Male :')}}
        {{Form::radio('gender','Male',[ 'class'=>'form-control '])}}
        {{Form::label('gender','Female :')}}
        {{Form::radio('gender','Female',[ 'class'=>'form-control '])}}
        </div>
        <div class="col-4">
        {{Form::label('nic','NIC :')}}
        {{Form::text('nic',$dashes->nic,[ 'class'=>'form-control ','placeholder'=>'NIC Number'])}}
        </div>
    </div>
</div>
  
  <div class="form-group">
        {{Form::label('address','Address :')}}
        {{Form::text('address',$dashes->address,[ 'class'=>'form-control ','placeholder'=>'Address'])}}
</div>
<div class="form-group">
        <div class="row">
                <div class="col">
        {{Form::label('m_tp_no','Mobile :')}}
        {{Form::number('m_tp_no',$dashes->m_tp_no,[ 'class'=>'form-control ','placeholder'=>'Contact Number'])}}
    </div>
    <div class="col">
        {{Form::label('h_tp_no','Land line :')}}
        {{Form::number('h_tp_no',$dashes->h_tp_no,[ 'class'=>'form-control ','placeholder'=>'Contact Number'])}}
    </div>
    </div>
    </div>
    <div class="form-group">
            {{Form::label('email','Email :')}}
            {{Form::text('email',$dashes->email,['class'=>'form-control  col-md-6','placeholder'=>'Email'])}}
        
        </div>
        <br>
        <hr>
        <h4>User Emergency Details</h4>
        <hr>
        <br>
        <div class="form-group">
                {{Form::label('b_grp','Blood Group :')}}
                {{Form::text('b_grp',$dashes->b_grp,['class'=>'form-control  col-md-2','placeholder'=>'Blood Groop'])}}
            
            </div>


<div class="form-group">
    <div class="row">
        <div class="col">
            <hr>
            {{Form::label('emg_one','Emergency Contact 1 :')}}<hr>
            {{Form::label('emg_one_name','Name :')}}
            {{Form::text('emg_one_name',$dashes->emg_one_name,['class'=>'form-control ','placeholder'=>'Name'])}}
            {{Form::label('emg_one_relationto_user','Relation to User :')}}
            {{Form::text('emg_one_relationto_user',$dashes->emg_one_relationto_user,['class'=>'form-control ','placeholder'=>'Relation to User'])}}
            {{Form::label('emg_one','Contact Number :')}}
            {{Form::number('emg_one',$dashes->emg_one,['class'=>'form-control ','placeholder'=>'Contact Number'])}}
        </div>
        <div class="col">
                <hr>
            {{Form::label('emg_two','Emergency Contact 2 :')}}<hr>
            {{Form::label('emg_two_name','Name :')}}
            {{Form::text('emg_two_name',$dashes->emg_two_name,['class'=>'form-control ','placeholder'=>'Name'])}}
            {{Form::label('emg_two_relationto_user','Relation to User :')}}
            {{Form::text('emg_two_relationto_user',$dashes->emg_two_relationto_user,['class'=>'form-control  ','placeholder'=>'Relation to User'])}}
            {{Form::label('emg_two','Contact Number :')}}
            {{Form::number('emg_two',$dashes->emg_two,['class'=>'form-control ','placeholder'=>'Contact Number'])}}
        </div>
    </div>
    </div>
    <div class="form-group">
            {{Form::label('description','Description :')}}
            {{Form::textarea('description',$dashes->description,[ 'id'=>'article-ckeditor','class'=>'form-control ','placeholder'=>'Description'])}}

  </div>
  {{Form::hidden('_method','PUT')}}
  {{Form::submit('Save',['class'=>'btn btn-success'])}} 
{!! Form::close() !!}  
</div>
@endsection