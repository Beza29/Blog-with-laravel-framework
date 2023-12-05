@extends('layouts.master')
@section('title','Category')
@section('content')
<div class="container-fluid px-4">
                       
</div>
<div class = "card mt-4">
    <div class ="card-header">
    <h1 class="">Add-Category</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class ="card-body">
    <form action="{{ route('add-category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
<div class="mb-3">
    <label for="">Category Name</label>
    <input type="text" name="name" class="form control"> 
    
</div>
<div class="mb-3">
    <label for="">Slug</label>
    <input type="text"name="slug" class="form control"> 
</div>
<div class="mb-3">
    <label for="">Description</label>
    <textarea name="description" id="mySummernote"rows="5" class="form control"> </textarea>
</div>
<div class="mb-3">
    <label for="">Image</label>
    <input type="file" name="image" class="form control"> 
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
<h> Status Mode</h6>
<div class="row">
<div class="col-md-3 mb-3">
    <label for="">Navbar Status</label>
    <input type="checkbox"name="navbar_status" /> 
</div>
<div class="col-md-3 mb-3">
    <label for=""> Status</label>
    <input type="checkbox"name="status" /> 
</div>
<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Save catagory</button>
</div>

</form>
</div>
                
                    </div>
                    @endsection