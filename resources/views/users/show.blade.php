@extends('layouts.app')

@section('content')
<div class="card">
    <h5 class="card-header">User Details</h5>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->id}}">
        </div>
        <div class="form-group">
            <label for="user_name">Name</label>
            <input type="text" class="form-control" id="user_name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="text" class="form-control" id="user_email" value="{{$user->email}}">
        </div>
    </div>
</div>
@endsection