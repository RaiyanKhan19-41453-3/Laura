@if ($editing ?? false)
    <form action="{{route('ideas.update', $idea->id)}}" method="POST" style="display: flex; justify-content: center">
        @csrf
        @method('put')
        <textarea name="idea" id="" rows="3" cols="30">{{$idea->content}}</textarea>
        <button type="submit">Post</button>
    </form>

    <div style="display: flex; justify-content: center; margin-bottom: 1rem">
        @error('idea')
            <span>{{$message}}</span>
        @enderror
    </div>
@else
    <div class="item" style="border: 1px solid black; display: flex; gap: 0 3rem; margin: 0 display: flex; align-items: center; margin-bottom: 1rem">
        <p style="display: flex; align-items: center;">{{$idea}}</p>
        <form action="{{route('ideas.destroy', $idea->id)}}" method="post" style="margin: 0;">
            @csrf
            @method('delete')
            <button type="submit">X</button>
        </form>
    </div>

    @if (session()->has('success'))
        <p>{{session('success')}}</p>
    @endif

    <form action="{{route('ideas.comments.store', $idea->id)}}" method="post" style="display: flex; justify-content: center">
        @csrf
        <textarea name="comment" id="" rows="3" cols="30"></textarea>
        <button type="submit">Post Comment</button>
    </form>
    <h3>Comment List</h3>

    @include('ideas.comments.show')

    

@endif

