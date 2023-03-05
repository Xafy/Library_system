@extends('layout')
@section('content')
@include('elements.errors')
    <div>
        <form action="{{route('books.update', $book->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Book title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ old('title') ?? $book->title}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Book description</label>
                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3">{{ old('desc') ?? $book->desc}}</textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="img" id="inputGroupFile02">
                <label class="input-group-text"  for="inputGroupFile02">Upload</label>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update Book</button>
        </form>
    </div>
@endsection