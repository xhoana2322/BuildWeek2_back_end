<form action="{{ route('homepage.index') }} " method="GET" class="searchForm d-flex py-3 ms-2 me-3" role="search">
    <input class="searchText form-control me-0 border-0" type="text" name="search" placeholder="Search your books!" value="{{ request()->input('search') }}" aria-label="Search">
    <button class="searchBtn btn btn-outline-light rounded-0" type="submit">Search</button>
</form>