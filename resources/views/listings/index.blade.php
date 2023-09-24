<x-layout>
    @include('partials._hero')
    {{-- includes is like import so here we are importing thr partials._hero --}}
    @include('partials._search')
    {{-- <h1> {{ $heading }}</h1> --}}
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        {{-- there is no problem in the database  --}}
        @unless (count($listings) == 0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
                {{-- if your just gonna pass a variable you need to prefix the prop name with the ` : ` column
                     also the column binds the `$listing` variable to the prop `listing`
                --}}
            @endforeach
        @endunless
    </div>
    <div class="mt-6 p-4">

        {{ $listings->links() }}
        {{--  so this would show the pages links  --}}
    </div>
</x-layout>
