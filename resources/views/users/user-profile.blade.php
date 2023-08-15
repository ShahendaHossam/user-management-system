@extends('layouts.app')

@section('content')
<main>
    <div class="cotainer">
        <div class="row flex m-auto">
            <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-header">Update User Profile</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('user.update', $users->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-6">
                                    <input wire:model.lazy="user.name" type="text" id="name" class="form-control" name="name" value="{{$users->name}}" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label">Password</label>
                                <div class="col-md-6">
                                    <input wire:model.lazy="user.password" type="text" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" wire:click="update()">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card justify-content-end" >
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection