@if(session()->has('failed'))
    <div class="alert alert-light alert-dismissible fade show text-danger mt-2 shadow" role="alert">
        {{ session('failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
