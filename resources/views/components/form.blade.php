    <h4> @lang('ideas.share_ideas') </h4>

    <form action="{{route('idea.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="mb-3">
                <textarea name='content' class="form-control" id="idea" rows="3"></textarea>
                @error('content')
                    <span class="d-block mt-2 fs-6 text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark rounded btn-sm"> @lang('ideas.post') </button>
            </div>
        </div>
    </form>
