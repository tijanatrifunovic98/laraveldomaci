@extends('layouts.app')

@section('content')
<h1>Articles</h1>
@if(count($articles)>0)
    @foreach($articles as $article)
    <div class="well">
        <div class="jumbotron">
        <h3><a href="/articles/{{$article->id}}">{{$article->title}}</a></h3>
        <div>
        <?php
        $country=new App\Models\Country;
        $country=App\Models\Country::find($article->country_id);
        echo 'Country:'.$country->name;
       ?>
        </div>
        <small>Written on {{$article->created_at}} by {{$article->user->name}}</small>
        </div>
    </div>
    @endforeach
    {{$articles->links()}}
    @else 
    <p>No articles found</p>
@endif
@endsection