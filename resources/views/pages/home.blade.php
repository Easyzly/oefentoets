@extends('base')

@section('content')
<div class="mainwidth">
    @foreach ($blogs as $blog)
    <div class="CreatorWidget">
    <div class="comments">
        <h2 style="border-bottom: 1px black solid" >{{ $blog->user->name  }} | {{ $blog->subject  }}</h2>
        <h5>{{ $blog->content  }}</h5>
        <a href="{{ route('blogview', ['blog' => $blog->id]) }}">Join the chat!</a>
    </div>
    </div>
@endforeach
</div>
@endsection