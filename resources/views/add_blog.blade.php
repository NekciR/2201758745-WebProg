@extends('../layout/master')


@section('content')

<div class="add-blog-form">
    <form method="POST" action="{{route('addblog')}}" enctype="multipart/form-data">
        <h2 class="text-center">New Blog</h2>
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{session()->get('success')}}
            </div>
        @endif

        {{ csrf_field() }}
        <div class="form-group">
            <span>Title</span>
            <input type="title" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" placeholder="Title" value="{{old('title')}}">
            @if ($errors->has('title'))
                <div class="invalid-feedback">
                    {{$errors->first('title')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <span>Category &nbsp</span>
            <select name="category" id="category" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <span>Story</span>
            <textarea name="story" class="form-control {{$errors->has('story') ? 'is-invalid' : ''}}" placeholder="Story..." value="{{old('story')}}"></textarea>
            @if ($errors->has('story'))
                <div class="invalid-feedback">
                    {{$errors->first('story')}}
                </div>
            @endif

        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="image" id="image">
            @if ($errors->has('image'))
                <div class="invalid-feedback d-block">
                    {{$errors->first('image')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </div>
    </form>
</div>

@endsection
