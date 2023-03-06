@extends('layout')

@section('content')
    @foreach ($categories as $category)
    <div>
        <ul>
            <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
        </ul>
    </div>
    @endforeach
@endsection
