@extends('../layout/master')


@section('content')

<div class="login-form">
    <form action="#" method="POST" action="{{route('register')}}">
        <h2 class="text-center">Sign Up</h2>
        {{ csrf_field() }}
        <div class="form-group">
            <span>Name</span>
            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Name" value="{{old('name')}}">
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <span>Email</span>
            <input type="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email" value="{{old('email')}}">
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{$errors->first('email')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <span>Password</span>
            <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Password">
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{$errors->first('password')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <span>Confirm Password</span>
            <input type="password" name="password_confirmation" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" placeholder="Confirm Password">
            @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{$errors->first('password_confirmation')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <span>Phone Number</span>
            <input type="text" name="phone" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" placeholder="Phone Number">
            @if ($errors->has('phone'))
                <div class="invalid-feedback">
                    {{$errors->first('phone')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </div>
    </form>
    <p class="text-center"><a href="/login">Already have account? Login now</a></p>
</div>

@endsection
