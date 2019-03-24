@extends('layouts.app')
@section('content')
<br><h3> Channeling Payments For Channeling Invoince ID:&nbsp{{$payment->id}}</h3>
            {!! Form::open(['action'=> ['EchannelingController@updateTwo',$payment->id], 'method'=>'PUT']) !!}
            <div class="form-group">
                {{Form::label('d_amount','Channeling Fees :')}}
                {{Form::text('d_amount','200',['class'=>'form-control col-md-6','placeholder'=>'Channeling amount'])}}

            </div>
            <div class="form-group">
                {{Form::label('h_amount','Debit/Credit Card Number:')}}
                {{Form::text('h_amount','',[ 'class'=>'form-control col-md-6','placeholder'=>'Card Number'])}}

            </div>
            <div class="form-group">
            {{Form::label('t_amount',' Secret Number :')}}
            {{Form::text('t_amount','',[ 'class'=>'form-control col-md-3','placeholder'=>'S Number'])}}

            </div>
            <div class="form-group">
                    {{Form::label('e_date','Expiry Date:')}}
                    {{Form::date('e_date','',[ 'class'=>'form-control col-md-6','placeholder'=>'Expiry Date'])}}

            </div>
                {{Form::submit('Pay',['class'=>'btn btn-success'])}} 
            {!! Form::close() !!}  







@endsection 