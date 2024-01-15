@auth
    @if (Auth::id() !== $user->id)
        <div>
            {{-- current user  wanna follow person --}}
            @if (Auth::user()->follows($user))
                <form action="{{ route('user.unfollow', $user->id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger btn-sm rounded shadow"> UNfollow </button>
                </form>
            @else
                <form action="{{ route('user.follow', $user->id) }}" method="post">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm rounded shadow"> Follow </button>
                </form>
            @endif
        </div>
    @endif
@endauth
