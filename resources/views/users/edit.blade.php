<div class=" card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            {{-- name --}}
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width: 90px;height: 90px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL() }}" alt="Mario Avatar">
                    <div>
                        <input name="name" type="text" value="{{ $user->name }}" class="form-control">
                        @error('bio')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('users.show', $user->id) }}">view</a>
                        @endif
                    @endauth
                </div>
            </div>
            {{-- img --}}
            <div class="mt-2">
                <h5 class="fs-5"> profile photo : </h5>
                <input type="file" name="img" class="form-control">
            </div>
            {{-- bio --}}
            <div class="px-2 mt-2">
                <h5 class="fs-5"> Bio : </h5>
                <div>
                    <textarea name="bio" class="form-control" id="bio" rows="4"></textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-outline-primary btn-sm my-2 shadow">save</button>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex">
                        <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                            </span> 120 Followers </a>
                        <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                            </span> {{ $user->ideas()->count() }} </a>
                        <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                            </span> {{ $user->comments()->count() }} </a>
                    </div>
                    @auth
                        @if (Auth::id() !== $user->id)
                            <div>
                                <button class="btn btn-outline-primary btn-sm shadow"> Follow </button>
                            </div>
                        @endif
                    @endauth
                </div>

            </div>
        </form>
    </div>
</div>
<hr>
