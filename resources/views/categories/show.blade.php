@extends('layout')


@section('content')

<h3>{{$category->name}}</h3>
<hr>
<div>
    <a href="{{route('categories.editForm', $category->id)}}">Edit Category</a>
</div>
<div>
    <form action="{{route('categories.delete', $category->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Category</button>
    </form>
</div>
<div>
    <a href="{{route('categories.index')}}">Go back to all categories</a>
</div>

@endsection