@extends('layouts.app')

@section('content')
<a href="/articles" class="btn btn-default">Go Back</a>
<h1>{{$article->title}}</h1>

    <div>
        {!!$article->body!!}
        
            <?php
             $country=new App\Models\Country;
             $country=App\Models\Country::find($article->country_id);
             echo 'Country:'.$country->name;
            ?>
      
    </div>
    <hr>
    <small>Written on {{$article->created_at}}</small>
   
   
@endsection