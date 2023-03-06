@extends('layout')
@section('content')
<div class="row">
    <div class="col-6 offset-3">
        @include('elements.errors')
        <form action="{{route('users.register')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Full name</label>
                <input type="text" name="name" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="avatar" id="inputGroupFile02">
                <label class="input-group-text" name="avatar" for="inputGroupFile02">Upload Avatar</label>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Register</button>
        </form>
    </div>
</div>
@endsection