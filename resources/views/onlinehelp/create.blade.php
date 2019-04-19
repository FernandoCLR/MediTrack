
    @extends('layouts.app')
    
    @section('content')
        <h3> Ask New Question ?</h3>
        {!! Form::open(['action'=> 'onlineHelpController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title :')}}
            {{Form::text('title','',['class'=>'form-control col-md-6','placeholder'=>'Title', 'required'])}}

        </div>
         <div class="form-group">
                    {{Form::label('question','Question :')}}
                    {{Form::textarea('question','',[ 'id'=>'article-ckeditor','class'=>'form-control ','placeholder'=>'Question', 'required'])}}
         </div>
            {{Form::submit('Ask',['class'=>'btn btn-success'])}} 
    {!! Form::close() !!}  

    
    @endsection
    
    