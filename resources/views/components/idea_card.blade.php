<div class="mt-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center ">
                    <img style="width:50px;height: 50px" class="me-2 avatar-sm rounded-circle"
                        src="{{ $idea->user->getImageURL() }}">
                    <div>
                        <h5 class="card-title mb-0 ">
                            <a class="text-decoration-none" href="{{ route('users.show', $idea->user_id) }}">
                                {{ $idea->user->name }}
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('idea.show', $idea->id) }}" class="btn btn-outline-primary btn-sm rounded me-2"> @lang('ideas.view') </a>
{{-- by gate --}}
                    @can('idea-edit', $idea)
                        <a href="{{ route('idea.edit', $idea->id) }}" class="btn btn-outline-warning btn-sm rounded me-2"> @lang('ideas.edit') </a>
                    @endcan
{{-- by policy --}}
                    @can('delete', $idea)
                        <form action="{{ route('idea.destroy', $idea->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger btn-sm rounded-pill">X</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">

            @if ($editing ?? false)
                <form action="{{ route('idea.update', $idea->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" id="form_input" name="form_input"
                            value="{{ $idea->content }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mt-2 rounded"> @lang('ideas.update')</button>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->content }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                @include('idea.like_unlike')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at->diffForHumans() }} </span>
                </div>
            </div>
            @include('components.comment')
        </div>
    </div>
</div>
