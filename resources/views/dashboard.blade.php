@extends('layout.layout')


@section('content')


    @auth
    <form action="{{route('ideas.store')}}" method="POST" style="display: flex; justify-content: center">
        @csrf
        <textarea name="idea" id="" rows="3" cols="30"></textarea>
        <button type="submit">Post</button>
    </form>

    <div style="display: flex; justify-content: center; margin-bottom: 1rem">
        @error('idea')
            <span>{{$message}}</span>
        @enderror
    </div>
    @endauth

    @guest
    <h2>Log in to make post</h2>
    @endguest

    {{-- Version 1 of For each --}}
    {{-- @foreach ($ideas as $idea)
    <div class="item" style="border: 1px solid black; display: flex; gap: 0 3rem; margin: 0 display: flex; align-items: center; margin-bottom: 1rem">
        <p style="display: flex; align-items: center;">{{$idea}}</p>
        <form action="{{route('ideas.destroy', $idea->id)}}" method="post" style="margin: 0;">
            @csrf
            @method('delete')
            <button type="submit">X</button>
        </form>
        <a href="{{route('ideas.index', $idea->id)}}">View</a>
        <a href="{{route('ideas.edit', $idea->id)}}">Edit</a>
    </div>
    @endforeach --}}

    {{-- Version 2 of For each --}}
    @forelse ($ideas as $idea)
    <div class="item" style="border: 1px solid black; display: flex; gap: 0 3rem; margin: 0 display: flex; align-items: center; margin-bottom: 1rem">
        <p style="display: flex; align-items: center;">{{$idea->content}}</p>
        <form action="{{route('ideas.destroy', $idea->id)}}" method="post" style="margin: 0;">
            @csrf
            @method('delete')
            <button type="submit">X</button>
        </form>
        <a href="{{route('ideas.index', $idea->id)}}">View</a>
        <a href="{{route('ideas.edit', $idea->id)}}">Edit</a>
    </div>
    @empty
    <p>No Items found</p>
    @endforelse


    {{$ideas->withQueryString()->links()}}


@endsection


