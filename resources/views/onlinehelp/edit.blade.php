
    @extends('layouts.app')
    
    @section('content')
        <h3> Edit</h3>
        {!! Form::open(['action'=> ['onlineHelpController@update',$help->id], 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title :')}}
            {{Form::text('title',$help->title,['class'=>'form-control col-md-6','placeholder'=>'Title'])}}

        </div>
         <div class="form-group">
                    {{Form::label('question','Question :')}}
                    {{Form::textarea('question',$help->question,[ 'id'=>'article-ckeditor','class'=>'form-control ','placeholder'=>'Question'])}}
         </div>
         <div class="form-group">
            {{Form::label('answer','Answer question :')}}
            {{Form::textarea('answer',$help->answer,[ 'id'=>'article-ckeditor','class'=>'form-control ','placeholder'=>'Answer question'])}}
 </div>
 {{Form::hidden('_method','PUT')}}
 {{Form::submit('Save',['class'=>'btn btn-success'])}} 
{!! Form::close() !!} 

    
    @endsection
    
    