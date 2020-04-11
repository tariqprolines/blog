@extends('layouts.master')
@section('title')
    Add New Post
@endsection
@section('content')
@if(count($errors) > 0)
<div class="alert alert-danger mt-3">
  <ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<h3>Add New Post</h3>
<form method="post" action="{{route('newPost')}}">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea name="description" value="{{ old('description') }}" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description"></textarea>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" /> 
  </div>
</form>
@endsection