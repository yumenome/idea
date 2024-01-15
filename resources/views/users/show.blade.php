@extends('components.layouts')

@section('title', $user->name)

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('components.left_side_box')
            </div>
            <div class="col-6">
                <div >
                    @if($editing ?? false)
                    @include('users.edit')
                    @else
                    @include('users.profile')
                    @endif
                </div>
                @forelse ($ideas as $idea)
                    @include('components.idea_card')
                @empty
                    <p class="text-center text-danger fs-5 py-2">"404, no results found!"</p>
                @endforelse

                <div class="mt-2">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            </div>
            <div class="col-3">
                    @include('components.search_bar')
                    @include('components.follow_box')
            </div>
        </div>
    </div>
@endsection
