
@extends('layouts.app')
@section('title',"$setting->meta_title")
@section('meta_description',"$setting->meta_description")
@section('meta_keyword',"$setting->meta_keyword")
@section('content')
<div class="bg-danger py-5">
<div class="container">
    <div class="row">
        <div class="cl-md-12">
        <div class="owl-carousel category-carousel owl-theme">
            @foreach($all_categories as $all_cate_items)
            <div class="item">
                <a href="{{url('news',$all_cate_items->slug)}}"class="text-decoration-none">
                <div class="card">
                    <img src="{{asset('uploads/category/'.$all_cate_items->image)}}" alt="image">
                    <div class="card-body text-center">
                <h5 class="text-dark">{{$all_cate_items->name}}</h5>
                    </div>
                    </div>
                     </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
        <h3>Adevertise here</h3>
    </div>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
              <h4> latest news</h4>
              <div class="underline"></div>
              <p> 
              You are the sum total of everything you’ve ever seen, heard, eaten, smelled, been told, forgot ― it’s all there. Everything influences each of us, and because of that I try to make sure that my experiences are positive
              </p>
              <p> 
              You are the sum total of everything you’ve ever seen, heard, eaten, smelled, been told, forgot ― it’s all there. Everything influences each of us, and because of that I try to make sure that my experiences are positive
              </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
              <h4>All Catagories</h4>
              <div class="underline"></div>
                </div>
                
                @foreach($all_categories as $all_cateitem)
                <div class="col-md-3">
              <div class="card card-body mb-3">
                <a href="{{url('news',$all_cateitem->slug)}}" class="text-decoration-none">
                <h4 class="text-dark mb-0">{{$all_cateitem->name}}</h4>
                </a>
              </div>
              </div>
              @endforeach
            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-white">
        <div class="container">
            <div class="row">
              <h4>latest posts</h4>
              <div class="underline"></div>
                </div>
                <div class="col-md-8">
                @foreach($latest_posts as $latest_post_item)
              <div class="card card-body bg-gray shadow mb-3">
                <a href="{{url('news', $latest_post_item->category->slug . '/' . $latest_post_item->slug)}}" class="text-decoration-none">
                <h4 class="text-dark mb-0">{{ $latest_post_item->name }}</h4>
                </a>
                <h6>Posted on:{{ $latest_post_item->created_at->format('d-m-y') }}</h6>
              </div>
              @endforeach
                </div>
                <div class="col-md-4">
                <div class="border text-center p-3">
                <h3>Adevertise here</h3>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
