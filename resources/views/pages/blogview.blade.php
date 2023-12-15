@extends('base')

@section('content')
<div class="CreatorWidget">
    <h1>{{ $blog->user->name  }}</h1>
    <h2 style="border-bottom: 1px black solid">{{ $blog->subject  }}</h2>
    <h3>{{ $blog->content  }}</h3>
</div>

<div class="CommentWidgets">
    <div class="comments">
      @foreach ($comments as $comment)
        <div class="comment">
            <h4>{{ $comment->user->name }}</h4>
            <p>{{ $comment->content }}</p>
        </div>
      @endforeach
    </div>
</div>

<div class="widgetholder">
    <div class="comments">
        <h1>Comment Aanmaken:</h1>
        <p style="background-color: snow; height: 5px"></p>
        <br>
        <form method="post" action="{{ route('storeComment') }}">
            @csrf
            <label for="commentContent">Comment:</label>
            <textarea id="commentContent" name="content" required></textarea>
        
            {{-- oude code kunnen gebruiken met kleine aanpassingen --}}
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
            <br>
            <button type="submit">Aanmaken</button>
        </form>
        <br>
        <p style="background-color: snow; height: 5px"></p>
    </div>
</div>


@endsection

