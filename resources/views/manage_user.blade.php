@extends('../layout/master')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{session()->get('success')}}
        </div>
    @endif

    <table class="table width-50%">
        <thead>
            <tr class="bg-primary text-light">
                <th scope="col" style="width: 20%">Name</th>
                <th scope="col" style="width: 60%">Email</th>
                <th scope="col" style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
                <tr >
                    <td><a href="/article/user/{{$user->id}}">{{$user->name}}</a></td>
                    <td class="text-truncate">{{$user->email}}</td>
                    <td><a class="btn btn-danger" role="button" href="/user/destroy/{{$user->id}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
