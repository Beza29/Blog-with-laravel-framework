@extends('layouts.master')
@section('content')

<div class="container-fluid px-4">
      <h1 class="mt-4">Dashboard</h1>
         <ol class="breadcrumb mb-4">
            </ol>
        <div class="row">
        <div class="col-md-12">
        @if(session('message'))
            <h1 class="alert alert-warnng mb-3">{{session('message')}}</h1>
            @endif
         <div class="card">
          <div class="card-header">
          <h1>Website Setting</h1>
             </div>
          <div class="card-body">
        <form action="{{url('admin/settings')}}" method="POST" enctype="multipart/form-data">
               @csrf
             <div class="mb-3">
             <lable>Website name</lable>
        <input type="text" name="website_name" required @if($setting) value="{{$setting->website_name}}" @endif class="form-control"/>
            </div>
            <div class="mb-3">
          <lable>Website logo</lable>
        <input type="file" name="website_logo" class="form-control"/>
        @if($setting) 
        <img src="{{asset('uploads/settings'.$setting->logo )}}" width="70px" height="70px" alt="logo">
        @endif
            </div>
        <div class="mb-3">
             <lable>Website fevicon</lable>
                <input type="file" name="website_fevicon" class="form-control"/>
                @if($setting) 
        <img src="{{asset('uploads/settings'.$setting->fevicon )}}" width="50px" height="70px" alt="icon">
        @endif
                </div>
                <div class="mb-3">
                <lable>Description</lable>
              <textarea name="description" class="form-control" rows="3">@if($setting) "{{$setting->description}}" @endif</textarea>
                </div>
             <div class="mb-3">
            <h4>SEO - Meta Tags</h4>
          <lable>Meta title</lable>
        <input type="text" name="meta_title" @if($setting) value="{{$setting->meta_title}}" @endif class="form-control"/>
            </div>
            <div class="mb-3">
                <lable>Meta Keyword</lable>
              <textarea name="meta_keyword" class="form-control" rows="3">@if($setting) "{{$setting->meta_keyword}}" @endif</textarea>
                            </div>
                <div class="mb-3">
                <lable>Meta description</lable>
              <textarea name="meta_description" class="form-control" rows="3">@if($setting) "{{$setting->meta_description}}" @endif</textarea>
                            </div>
                                 <div class="mb-3">
<button type="submit" class="btn btn-primary">Save</button>
                                 </div>           
             </form>
             </div>
            </div>
            </div>
            </div>
            </div>
             @endsection