@foreach ($idea->comments as $comment)
    <div class="item" style="border: 1px solid black; display: flex; gap: 0 3rem; margin: 0 display: flex; align-items: center; margin-bottom: 1rem">
        <p style="display: flex; align-items: center;">{{$comment}}</p>
        {{-- <form action="{{route('ideas.destroy', $idea->id)}}" method="post" style="margin: 0;">
            @csrf
            @method('delete')
            <button type="submit">X</button>
        </form> --}}
    </div>
@endforeach