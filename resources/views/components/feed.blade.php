@extends('components.layouts')

@section('title', 'feed')


@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('components.left_side_box')
            </div>
            <div class="col-6">
                @include('components.success_msg')
                {{-- @auth
                    @include('components.form')
                @endauth
                @guest
                    <h1 class="text-danger">login to taste us!</h1>
                @endguest --}}
                @forelse ($ideas as $idea)
                    @include('components.idea_card')
                @empty
                    <p class="text-center text-danger fs-5 py-2">"404, no results found!"</p>
                @endforelse

                {{-- <div class="mt-2">
                    {{ $ideas->withQueryString()->links() }}
                </div> --}}
            </div>
            <div class="col-3">
                @include('components.search_bar')
                @include('components.follow_box')
            </div>
        </div>
    </div>
@endsection
