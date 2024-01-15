<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('dashboard')) ? 'bg-dark text-light rounded text-center shadow' : '' }} nav-link" href="{{ route('dashboard') }}">
                    <span>@lang('ideas.home')</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('feed')) ? 'bg-dark text-light rounded text-center shadow' : '' }} nav-link" href="{{ route('feed') }}">
                    <span>@lang('ideas.feed')</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('profile')) ? 'bg-dark text-light rounded text-center shadow' : '' }} nav-link" href="{{ route('profile') }}">
                    <span>@lang('ideas.profile')</span></a>
            </li>

        </ul>
    </div>
    {{-- composer require barryvdh/laravel-debugbar --dev --}}
    <div class="card-footer text-center py-2">
        <a class="btn btn-link" href="{{ route('lang', 'en') }}">eng</a>
        <a class="btn btn-link" href="{{ route('lang', 'jp') }}">jp</a>
    </div>
</div>
