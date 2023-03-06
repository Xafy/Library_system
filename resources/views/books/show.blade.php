@extends('layout')


@section('content')

<h3>{{$book->title}}</h3>
<p>{{$book->desc}}</p>
<p>{{$book->id}}</p>
<hr>
@if ($book->categories->count() > 0)
    <h5>Categories</h5>
    @foreach ($book->categories as $category)
        <a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
    @endforeach
@endif

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
