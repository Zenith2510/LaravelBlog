@extends("layouts.app")

@section("content")
    <div class="container" style="max-width: 800px">

        {{ $articles->links() }}

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @foreach($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h3 class="h4 card-title">{{ $article->title }}</h3>
                    <div style="font-size: 0.8em" class="text-muted">
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                    <div>
                        {{ $article->body }}
                    </div>
                    <div class="mt-2">
                        <a href="{{ url("/articles/detail/$article->id") }}">
                            View Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
