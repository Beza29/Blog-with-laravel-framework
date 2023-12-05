@extends('layouts.master')
@section('title', 'Edit users')
@section('content')
<div class="container-fluid px-4">
    <div class="card">

    <div class="card.header">
    <a href="{{ url ('admin/users') }}" class="btn btn-danger float-end">Back</a>
        <h4>Edit users
           
            
</h4>
</div>
<div class="card body">
    <form action="">
        <div class="mb-3">
            <label>Full name</label>
            <p class="form-control">{{$user->name}}</p>
            </div>
            <div class="mb-3">
            <label>Email ID</label>
            <p class="form-control">{{$user->email}}</p>
            </div>
            <div class="mb-3">
            <label>Created at</label>
            <p class="form-control">{{$user->created_at->format('d/m/y')}}</p>
            </div>

            <form action="{{ url ('admin/update-user/'.$user->id)}}" method="POST">
                @csrf
                @method ('PUT')
            <div class="mb-3">
            <label>Role as</label>
            <select name="role_as" class="form-control">
                <option value="1" {{$user->role_as=='1' ? 'selected':''}}>Admin</option>
                <option value="0" {{$user->role_as=='0' ? 'selected':''}}>User</option>
                <option value="2" {{$user->role_as=='2' ? 'selected':''}}>Blogger</option>

            </select>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update user role</button>
        
</div>
</form>
</form>
</div>
</div>

</div>
@endsection