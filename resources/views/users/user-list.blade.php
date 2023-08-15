@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="card">
            <h5 class="card-header">Users List</h5>
            <div class="card-body">
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @if(auth()->user()->email == $user->email)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <a role="button" class="btn btn-light" href="{{route('user.edit', $user->id)}}">Edit</a>
                                    <a role="button" class="btn btn-primary" href="{{route('user.show', $user->id)}}">View</a>
                                    <form method="POST" action="{{route('user.destroy', $user->id)}}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Proceed With The Current Request!')" id="deleteInfo" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @elseif(auth()->user()->role == 'admin')
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <a role="button" class="btn btn-light" href="{{route('user.edit', $user->id)}}">Edit</a>
                                    <a role="button" class="btn btn-primary" href="{{route('user.show', $user->id)}}">View</a>
                                    <form method="POST" action="{{route('user.destroy', $user->id)}}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Proceed With The Current Request!')" id="deleteInfo" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mx-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</main>
@endsection