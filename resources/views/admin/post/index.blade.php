@extends('layouts.master')
@section('title', 'View post')
@section('content')
<div class="container-fluid px-4">
    <div class="card">

    <div class="card.header">

        <h4>View Posts
            <a href="{{ url ('admin/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
            
</h4>
</div>
<div class="card body">
@if (session('message'))
<div class="alert alert-success">{{ session ('message') }}</div>
@endif
<table id="myDataTable" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Post name</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{ optional($item->category)->name }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->Status=='1' ? 'Hidden':'Visible'}}</td>
            <td>
            <a href="{{ url ('admin/post', $item->id) }}" class="btn btn-primary float-end">Edit</a>
            </td>
            <td>
            <a href="{{ url ('admin/delete-post', $item->id) }}" class="btn btn-danger float-end">Delete</a>
            </td>
        </tr>
        @endforeach
    
    </tbody>

</table>
</div>
</div>

</div>
@endsection



