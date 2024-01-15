<div>
    <form action="{{ route('idea.comments.store', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            @error('content')
                <span class="text-danger fs-6">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> +Comment </button>
        </div>
    </form>
    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px;height:35px" class="me-2 avatar-sm rounded-circle"
                src="{{ $comment->user->getImageURL() }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $comment->user->name }}
                    </h6>
                    <small class="fs-6 fw-light text-muted">
                        {{ $comment->created_at->diffForHumans() }}
                    </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-center mt-3">no comment yet!</p>
    @endforelse
</div>
