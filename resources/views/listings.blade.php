@extends ('layout')
 {{-- by using the extends directive we are telling the listing.blade.php file
     that it will be a child template of the  layout template --}}

@section('content')
<h1> {{$heading}}</h1>
@unless (count($listings)==0)

@foreach ($listings as $listing)

<h2>
<a href="/listings/{{$listing["id"]}}">
{{-- {{$listing}} --}}
{{$listing['title']}}
</a>
</h2>
<p>
 {{$listing['description']}}
</p>
@endforeach
@endunless
@endsection

