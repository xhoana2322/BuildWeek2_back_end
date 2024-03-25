<form action="{{ route('homepage.index') }} " method="GET">
    <input type="text" name="search" placeholder="Cerca un libro..." value="{{ request()->input('search') }}">
    <button type="submit">Cerca</button>
</form>