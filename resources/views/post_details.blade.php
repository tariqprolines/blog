@extends('layouts.master')
@section('title')
    Post Details
@endsection
@section('content')
<div class="row mt-4">
  <div class="col-md-12">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h1>Post Details</h1>
  <div>  
</div>
<div class="row">
        <div class="col-md-12">
            <h2> {{ $post->title }} </h2>
            <p> {{ $post->description }} </p>
        </div>
</div>
<h3>Comments</h3>
@foreach($cmts as $cmt)
<div class="row">
    <div class="col-md-12" id="comment">
        <p>{{ $cmt->comment }}</p>
        <p>Posted by: <i>{{ $cmt->name }}</i></p>
    </div>
</div>
@endforeach
<h3>Write your comment!</h3>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif 
<form method="post" action="{{url('/saveComment',$post->id)}}">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input name="post_id" type="hidden" value="{{ $post->id }}" />
    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name">
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comment</label>
    <textarea name="comment" value="{{ old('comment') }}" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="write your comments"></textarea>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" /> 
  </div>
</form>
@endsection