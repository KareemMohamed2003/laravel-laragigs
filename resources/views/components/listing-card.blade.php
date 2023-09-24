{{-- this file listing-card.blade.php is a component so we need to pass it the $listing
 array as a prop just like we do in a react app we also need to use the @props directive

and give it the props we need to extract the data in an array like so @props(['listing'])
we can pass class name to components in laravel .

 --}}

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src={{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }} alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            {{-- <x-listing-tags :tagsCsv="$listing->tags" /> --}}
            {{-- when passing a variable to a component as a prop we put it
                between double cotation
                --}}
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
