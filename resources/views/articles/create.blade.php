@extends('layouts.app')
@section('content')
<h1>Create Articles</h1>
{!! Form::open(['action'=>'App\Http\Controllers\ArticleWebController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
</div>
<div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
</div>
<div class="form-group">
    {!! Form::select('countries', $countries, null, ['class' => 'form-control']) !!}
</div>
{{Form::submit('Sumbit',['class'=>'btn btn-primary'])}}
{!!Form::close()!!}

@endsection
