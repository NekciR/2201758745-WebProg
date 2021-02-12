@extends('../layout/master')


@section('content')

<div class="login-form">
    <form action="#" method="POST" action="{{route('updateprofile')}}">
        @method('PUT')
        <h2 class="text-center">Profile</h2>
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{session()->get('success')}}
            </div>
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <span>Name</span>
            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Name" value="{{Auth::user()->name}}">
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <span>Email</span>
            <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" disabled>

        </div>
        <div class="form-group">
            <span>Phone Number</span>
            <input type="text" name="phone" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" placeholder="Phone Number" value="{{Auth::user()->phone}}">
            @if ($errors->has('phone'))
                <div class="invalid-feedback">
                    {{$errors->first('phone')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
    </form>
</div>

@endsection
