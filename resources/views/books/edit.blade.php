@extends('layout')
@section('content')
    <div>
        <form action="{{route('books.update', $book->id)}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Book title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$book->title}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Book description</label>
                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3">{{$book->desc}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update Book</button>
        </form>
    </div>
@endsection