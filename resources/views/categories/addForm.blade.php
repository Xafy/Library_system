@extends('layout')
@section('content')

@include('elements.errors')
    <div>
        <form action="{{route('categories.add')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleFormControlInput1">
            </div>

            <button type="submit" class="btn btn-primary mb-3">Add Category</button>
        </form>
    </div>
@endsection