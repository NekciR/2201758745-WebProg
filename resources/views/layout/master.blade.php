<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wonderful Journey</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script>
        function goBack() {
          window.history.back()
        }
    </script>
</head>
<body>

    <div class="jumbotron jumbotron-fluid bg-primary">
        <div class="container text-light">
          <h1 class="display-4 text-center">Wonderful Journey</h1>
          <p class="lead text-center">Blog of Indonesia Tourism</p>
        </div>
      </div>

    <nav class="navbar navbar-dark navbar-expand-md bg-primary justify-content-center">
        <div class="d-flex w-50 mr-auto">
            {{-- <a href="/" class="navbar-brand">Just Du It</a> --}}
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/article">All</a>
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="/article/category/{{$category->id}}">{{$category->name}}</a>
                        @endforeach

                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/about">About Us</a>
                </li>
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">

            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                @if (!Auth::check())
                    <li class="nav-item active">
                        <a class="nav-link" href="/signup"><i class="fas fa-user-alt"></i> Sign Up</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-alt"></i>  {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            @if (Auth::user()->role == 'Admin')
                                <a class="dropdown-item" href="/user">Manage User</a>
                            @else
                                <a class="dropdown-item" href="/profile"><i class="fas fa-user-alt"></i> Profile</a>
                                <a class="dropdown-item" href="/article/myblog"><i class="fas fa-blog"></i> My Blog</a>
                            @endif

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/signout"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                        </div>
                    </li>
                @endif

            </ul>
        </div>
    </nav>

    <div class="container pt-5">
            @yield('content')
    </div>


</body>
</html>
