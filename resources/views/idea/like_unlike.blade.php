@auth
<div>
    {{-- already liked ? --}}
    @if(Auth::user()->likes($idea))
    <form action="{{ route('idea.unlike', $idea->id) }}" method="post">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6">
            <span class="fas fa-heart me-1"></span> {{ $idea->likeRS()->count() }} </button>
    </form>
    @else
    <form action="{{ route('idea.like', $idea->id) }}" method="post">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6">
            <span class="far fa-heart me-1"></span> {{ $idea->likeRS()->count() }} </button>
    </form>
    @endif
</div>

@endauth
@guest
    <a href="{{ route('login')}}" class="text-decoration-none"><span class="far fa-heart me-1"></span>
        {{ $idea->likeRS()->count() }}
    </a>
@endguest
