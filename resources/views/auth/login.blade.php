@extends('../layout/master')


@section('content')

<div class="login-form">
    <form action="#" method="POST" action="{{route('login')}}">
        <h2 class="text-center">Login</h2>
        @if (session()->has('failed'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('failed')}}
            </div>
        @endif
        {{ csrf_field() }}
        <div class="form-group form-inline">
            <span>Login As &nbsp</span>
            <select name="loginAs" id="loginAs" class="form-control">
              <option selected value="1">User</option>
              <option value="2">Admin</option>
            </select>
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
        <div class="form-check form-group">
            <input type="checkbox" class="form-check-input" name="remember" value="1">
            <label class="form-check-label">Remember me</label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>
    <p class="text-center"><a href="/signup">Create Account Now</a></p>
</div>

@endsection
