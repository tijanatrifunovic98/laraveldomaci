@extends('layouts.app')
@section('content')
<h1>Edit Article</h1>
{!! Form::open(['action'=>['App\Http\Controllers\ArticleWebController@update',$article->id],'method'=>'POST'])!!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'Title'])}}
</div>
<div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body',$article->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
</div>
<div class="form-group">
    {!! Form::select('countries', $countries, $article->country_id, ['class' => 'form-control']) !!}
</div>
{{Form::hidden('_method','PUT')}}
{{Form::submit('Sumbit',['class'=>'btn btn-primary'])}}
{!!Form::close()!!}

@endsection