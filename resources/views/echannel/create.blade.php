@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


@section('content')
<br><br>
<div class="container box">  
<div class="card mx-5">
  
      <div class="card-header bg-primary text-light"><h3 >MediTrack Channeling System</h3></div><br />
   {!! Form::open(['action'=> 'EchannelingController@search', 'method'=>'POST']) !!}
   <div class="form-group">
    <select name="hospital" id="hospital" class="form-control input-lg dynamic" data-dependent='area' data-dependent='d_name'>
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

   {{ csrf_field() }}
   <br />
  
  {{Form::submit('Channel',['class'=>'btn btn-success'])}} 
  {!! Form::close() !!} 
  <a class="btn btn-outline-primary float-right" href="/echannel/show" role="button">E Channel Dashboard</a>
  </div>
</div>
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
     });
    
    
    });
    </script>   
@endsection

