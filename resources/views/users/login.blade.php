@extends('layout')
@section('content')
<div class="row">
    <div class="col-6 offset-3">
        @include('elements.errors')
        <form action="{{route('users.login')}}" method="POST" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Login</button>
        </form>
        <div>
            <a href="{{route('github.redirect')}}" class="btn btn-warning">Login Using Github</a>
        </div>
    </div>
</div>
@endsection