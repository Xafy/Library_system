@extends('layout')
@section('content')

@include('elements.errors')
    <div>
        <form action="{{route('notes.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add a note :</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">{{old('content')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Add Note</button>
        </form>
    </div>
@endsection