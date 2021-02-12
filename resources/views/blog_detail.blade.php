@extends('../layout/master')


@section('content')

<div class="blog-detail">

    <button type="button" onclick="goBack()" class="btn btn-primary mb-3"><i class="fas fa-backward"></i> Back</button>
    <div>
        <h1>{{$article->title}}</h1>
    <label><small class="text-muted">{{$article->created_at->format('d-M-Y')}} | {{$article->category->name}} | By {{$article->user->name}} </small></label><br>
    </div>

    <img src="{{asset($article->image)}}" class="article-image" alt="">


    <p class="mt-3 text-justify tab">{{$article->description}}</p>


</div>

@endsection
