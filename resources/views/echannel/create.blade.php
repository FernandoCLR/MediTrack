@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


@section('content')
    <h3> Create Your Appoinment. </h3>
    
    <br />
  <div class="container box">
   <h3 >MediTrack Channeling System</h3><br />
   {!! Form::open(['action'=> 'EchannelingController@store', 'method'=>'POST']) !!}
   <div class="form-group">
    <select name="hospital" id="hospital" class="form-control input-lg dynamic" data-dependent="area">
     <option value="">Select hospital:</option>
     @foreach($hospital_list as $hospital)
     <option value="{{ $hospital->hospital}}">{{ $hospital->hospital }}</option>
     @endforeach
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="area" id="area" class="form-control input-lg dynamic" data-dependent="d_name">
     <option value="">Select Specilized Area:</option>
    </select>
   </div>
   <br/>
   <div class="form-group">
      <select name="d_name" id="d_name" class="form-control input-lg dynamic" data-dependent="date">
       <option value="">Select Doctor Name:</option>
      </select>
     </div>
     <br />
   <div class="form-group">
    <select name="date" id="date" class="form-control input-lg dynamic" data-dependent="time">
     <option value="">Select Date:</option>
    </select>
   </div>
   <br/>
   <div class="form-group">
    <select name="time" id="time" class="form-control input-lg " >
     <option value="">Select Avalabel Time:</option>
    </select>
   </div>
   {{ csrf_field() }}
   <br />
  </div>
  {{Form::submit('Channel',['class'=>'btn btn-success'])}} 
  {!! Form::close() !!} 
  <a class="btn btn-outline-primary float-right" href="/echannel/show" role="button">E Channel Dashboard</a>
  <script>
    $(document).ready(function(){
    
     $('.dynamic').change(function(){
      if($(this).val() != '')
      {
       var select = $(this).attr("id");
       var value = $(this).val();
       var dependent = $(this).data('dependent');
       var _token = $('input[name="_token"]').val();
       $.ajax({
        url:"{{ route('echannel.create.fetch') }}",
        method:"POST",
        data:{select:select, value:value, _token:_token, dependent:dependent},
        success:function(result)
        {
         $('#'+dependent).html(result);
        }
    
       })
      }
     });
    
     $('#hospital').change(function(){
      $('#area').val('');
      $('#d_name').val('');
      $('#date').val('');
      $('#time').val('');
     });
    
     $('#area').change(function(){
      $('#d_name').val('');
      $('#date').val('');
      $('#time').val('');
     });
     
     $('#d_name').change(function(){
      $('#date').val('');
      $('#time').val('');
     });

     $('#date').change(function(){
      $('#time').val('');
     });
    
    });
    </script>   
@endsection

