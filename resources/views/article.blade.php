@extends('layout/master')


@section('content')
<div class="row">
    @foreach ($articles as $article)
        <div class="col-sm-6 col-md-4 mb-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text text-overflow">{{$article->description}}</p>
                    <p><a href="/article/show/{{$article->id}}">Read More</a></p>
                </div>
                <div class="card-footer">
                    <label class="card-text m-0"><small class="text-muted">Category: <a href="/article/category/{{$article->category->id}}">{{$article->category->name}}</a></small></label><br>
                    <label class="card-text m-0"><small class="text-muted">{{$article->created_at}}</small></label><br>
                    <label class="card-text m-0"><small class="text-muted">By {{$article->user->name}}</small></label>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-5 mb-5">
    {{$articles->links()}}
</div>


@endsection
