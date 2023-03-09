@extends('layout')

{{-- @section('title')
    {{Auth::user()->name}}    
@endsection --}}

@section('content')
    @auth
        @foreach (Auth::user()->notes as $note)
            <p>{{$note->content}}</p>
        @endforeach
    @endauth
@endsection
