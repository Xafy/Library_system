@extends('layout')
@section('content')

@include('elements.errors')
    <div>
        <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Book title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Book description</label>
                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3">{{old('title')}}</textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="img" id="inputGroupFile02">
                <label class="input-group-text"  for="inputGroupFile02">Upload</label>
            </div>
            <div>
            @foreach ($categories as $category)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="categories[]" type="checkbox" id="{{$category->name}}" value="{{$category->id}}">
                    <label class="form-check-label" for="{{$category->name}}">{{$category->name}}</label>
                </div>
            @endforeach    
            </div>
            <button type="submit" class="btn btn-primary mb-3">Add Book</button>
        </form>
    </div>
@endsection