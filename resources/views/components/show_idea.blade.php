@extends('components.layouts')

@section('title', 'details')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('components.left_side_box')
            </div>
            <div class="col-6">
                <div style="margin-top: -15px">
                    @include('components.idea_card')
                </div>
            </div>
            <div class="col-3">
                    @include('components.search_bar')
                    @include('components.follow_box')
            </div>
        </div>
    </div>
@endsection
