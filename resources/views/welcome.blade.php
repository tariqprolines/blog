@extends('layouts.master')
@section('title')
    All Posts
@endsection
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
    @endif
        <h1>
                Latest Posts 
        </h1>
    </div>
</div>
<hr class="mb-5">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12">
            <h2> {{ $post->title }} </h2>
            <p> {{ $post->description }} </p>
            <p>Posted Date: {{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }} </p>
            <p>{{$post->comments_count}} comments</p>
            <p><a href="{{ url('/show',$post->id) }}">View Details</a></p>
        </div>
    </div>
    <hr/>
    @endforeach
    {!! $posts->links() !!}
@endsection