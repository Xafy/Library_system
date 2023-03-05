@extends('layout')


@section('content')

<h3>{{$book->title}}</h3>
<p>{{$book->desc}}</p>
<p>{{$book->id}}</p>
<hr>
<div>
    <a href="{{route('books.edit', $book->id)}}">Edit Book</a>
</div>
<div>
    <form action="{{route('books.delete', $book->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Book</button>
    </form>
</div>
<div>
    <a href="{{route('books.index')}}">Go back to all books</a>
</div>

@endsection
