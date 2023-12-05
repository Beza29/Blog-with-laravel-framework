@extends('layouts.master')
@section('title','Edit Post')
@section('content')
<div class="container-fluid px-4">
   @if ($errors->any())
   <div class= "alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{$error}}</div>
    @endforeach
</div>
@endif
</div>
<div class = "card mt-4">
    
    
    <div class ="card-header">
    <h4 class="">Edit-posts
    <a href="{{ url ('admin/posts') }}" class="btn btn-danger float-end">Back</a>
    </h4>
</div>
<div class="card-body">

  @if ($errors->any())
   <div class= "alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{$error}}</div>
    @endforeach
</div>
@endif
    <form action="{{ url ('admin/update-post/'.$post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Category</label>
            <select name="category_id" required class="form control">
            <option value="">--Select Catagory--</option>
                @foreach($category as $cateitem)
                <option value="{{$cateitem->id}}" {{$post->category_id== $cateitem->id ? 'selected':''}}>
                    {{$cateitem->name}}</option>
@endforeach
            
@if (session('message'))
<div class="alert alert-success">{{ session ('message') }}</div>
@endif
            </select>
</div> 
            <div class="mb-3">
    <label for="">Post Name</label>
    <input type="text"name="name" value="{{$post->name}}"class="form control"> 
</div>
<div class="mb-3">
    <label for="">Slug</label>
    <input type="text"name="slug"value="{{$post->slug}}" class="form control"> 
</div>
<div class="mb-3">
    <label for="">Description</label>
    <textarea name="description" id="mySummernote" class="form control" rows="5">{!! $post->description !!}</textarea>
</div>
<div class="mb-3">
    <label for="">Youtube Iframe link</label>
    <input type="text" name="yt_iframe"  class="form control" value="{{$post->yt_iframe}}"> 
</div>
<h6>SEO tags</h6>
<div class="mb-3">
    <label for="">Meta Title</label>
    <input type="text"name="meta_title" class="form control" value="{{$post->meta_title}}"> 
</div>
<div class="mb-3">
    <label for="">Meta Description</label>
    <textarea name="meta_description" rows="3" class="form control">{!! $post->meta_description !!} </textarea>
</div>
<div class="mb-3">
    <label for="">Meta Keyword</label>
    <textarea name="meta_keyword" rows="3" class="form control">{!! $post->meta_keyword!!}</textarea>
</div>
<h6> Status Mode</h6>
<div class="col-md-3 mb-3">
    <label for=""> Status</label>
    <input type="checkbox"name="status" /> 
</div>
<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Update post</button>
</div>
</div>
</form>
</div>
                
                    </div>
                    @endsection