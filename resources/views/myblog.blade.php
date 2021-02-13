@extends('../layout/master')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{session()->get('success')}}
        </div>
    @endif

    @if (Auth::user()->role == 'Admin')
        <h4>{{$user->name}}'s blog(s)</h4>
    @else
    <a role="button" href="/article/add" class="btn btn-outline-primary mb-3"><i class="fas fa-plus"></i> Add Blog</a>
    @endif
    <table class="table">
        <thead>
            <tr class="bg-primary text-light">
                <th scope="col" style="width: 20%">Title</th>
                <th scope="col" style="width: 60%">Story</th>
                <th scope="col" style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($articles as $article)
                <tr >
                    <td>{{$article->title}}</td>
                    <td class="text-truncate">{{$article->description}}</td>
                    <td><a class="btn btn-danger" role="button" href="/article/destroy/{{$article->id}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
