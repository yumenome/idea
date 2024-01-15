<div class=" card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width: 90px;height: 90px" class="me-3 avatar-sm rounded-circle"
                    src="{{ $user->getImageURL() }}" alt="Mario Avatar">
                <div>

                    <h3 class="card-title mb-0"><a class="text-decoration-none" href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted"> {{ $user->email }}</span>

                </div>
            </div>
            <div>
                @auth
                    @if (Auth::id() === $user->id)
                        <a class="btn btn-outline-warning btn-sm rounded me-2" href="{{ route('users.edit', $user->id) }}">edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-between align-items-center mb-3">
            @include('users.status')
            @include('users.follow')
            </div>

        </div>
    </div>
</div>
<hr>
