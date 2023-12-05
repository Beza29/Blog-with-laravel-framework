

@extends('layouts.master')
@section('title','Add Post')
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
    <h1 class="">Add-posts</h1>
</div>
<div class="card-body">
@if (session('message'))
<div class="alert alert-success">{{ session ('message') }}</div>
@endif
    <form action="{{ url ('admin/add-post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="">Category</label>
            <select name="category_id"class="form control">
                @foreach($category as $cateitem)
                <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
                @endforeach
               
            </select>
</div> 
            <div class="mb-3">
    <label for="">Post Name</label>
    <input type="text"name="name" class="form control"> 
</div>
<div class="mb-3">
    <label for="">Slug</label>
    <input type="text"name="slug" class="form control"> 
</div>
<div class="mb-3">
    <label for="">Description</label>
    <textarea name="description" id="mySummernote" rows="5" class="form control"> </textarea>
</div>
<div class="mb-3">
    <label for="">Youtube Iframe link</label>
    <input type="text" name="yt_iframe" class="form control"> 
</div>
<h6>SEO tags</h6>
<div class="mb-3">
    <label for="">Meta Title</label>
    <input type="text"name="meta_title" class="form control"> 
</div>
<div class="mb-3">
    <label for="">Meta Description</label>
    <textarea name="meta_description" rows="3" class="form control"> </textarea>
</div>
<div class="mb-3">
    <label for="">Meta Keyword</label>
    <textarea name="meta_keyword" rows="3" class="form control"> </textarea>
</div>
<h6> Status Mode</h6>
<div class="col-md-3 mb-3">
    <label for=""> Status</label>
    <input type="checkbox"name="status" /> 
</div>
<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Save post</button>
</div>
</form>
</div>
                
                    </div>
                    @endsection