@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="articles/create" class="btn btn-primary">Create post</a>
                    
                   <h3>Your Blog Posts</h3>
                
                   @if(count($articles) > 0)
                   <table class="table table-striped">
                       <tr>
                           <th>Title</th>
                           <th></th>
                           <th></th>
                       </tr>
                       @foreach($articles as $article)
                       <tr>
                        <td>Title</td>
                        <td>{{$article->title}}</td>
                        <td><a href="/articles/{{$article->id}}/edit" class="btn tbn-default">Edit</a></td>
                        <td>{!!Form::open(['action'=>['App\Http\Controllers\ArticleWebController@destroy',$article->id],'method'=>'POST','class'=>'pull-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>

                    </tr>

                       @endforeach
                   </table>
                   @else  
                   <p>You have no Posts</p>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
