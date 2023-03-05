@extends('layout')
@section('content')
    <div>
        <form action="{{route('books.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Book title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Book description</label>
                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Add Book</button>
        </form>
    </div>
@endsection