@extends("layouts.app")

@section("content")
    <div class="container" style="max-width: 600px">

        @if($errors->any())
            <div class="alert alert-warning">
                @foreach($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif

        <form action="{{url("articles/update/$article->id")}}" method="post">
            @csrf
            <div class="mb-2">
            <input type="hidden" name="article_id" value="{{$article->id}}">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="{{$article->title}}">
            </div>
            <div class="mb-2">
                <label for="">Body</label>
                <textarea name="body" class="form-control">{{$article->body}}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Category</label>
                <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Add Article</button>
        </form>
    </div>
@endsection
