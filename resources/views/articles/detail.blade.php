@extends("layouts.app")

@section("content")
    <div class="container" style="max-width: 800px">
        <div class="card mb-2 border-primary" style="font-size: 1.3em">
            <div class="card-body">
                <h3 class="card-title">{{ $article->title }}</h3>
                <div style="font-size: 0.8em" class="text-muted">
                    {{ $article->created_at->diffForHumans() }}
                     Category: <b>{{ $article->category->name }}</b>
                </div>
                <div>
                    {{ $article->body }}
                </div>
                <div class="mt-2">

                    <a href="{{ url("/articles/delete/$article->id") }}"
                        class="btn btn-danger btn-sm">
                        Delete
                    </a>
                </div>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments ({{count($article->comments)}})</b>
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{url("comments/delete/$comment->id")}}" class="btn-close float-end" ></a>
                    {{$comment->content}}
                    <div class="small mt-2">
                    By <b>{{ $comment->user->name }}</b>,
                    {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
            @endforeach
        </ul>

        @auth
            <form action="{{url('comments/add')}}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            {{-- <input type="hidden" name="user_id" value="{{$comment->user_id}}"> --}}
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <input type="submit" class="btn btn-secondary" value="Add Comment">
        </form>
        @endauth
    </div>
@endsection
