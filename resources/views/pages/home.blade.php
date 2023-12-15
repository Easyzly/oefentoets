@extends('base')

@section('content')
<div class="mainwidth">
    @foreach ($blogs as $blog)
    <div class="CreatorWidget">
    <div class="comments">
        <h1>{{ $blog->user->name  }}</h1>
        <h3 style="border-bottom: 1px black solid">{{ $blog->subject  }}</h3>
        <h5>{{ $blog->content  }}</h5>
        <a href="{{ route('blogview', ['blog' => $blog->id]) }}">Join the chat!</a>
    </div>
    </div>
@endforeach
</div>
@endsection