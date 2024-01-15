<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class=""> @lang('ideas.search_ideas') </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard') }}">
            <input value="{{request('search')}}" placeholder="...
            " class="form-control w-100" type="text" name="search">
            <button class="btn btn-outline-primary mt-2 rounded " style="width: 100%">  @lang('ideas.search') </button>
        </form>
    </div>
</div>
