
<h1> no listings</h1>
@unless (count($listings)==0)

@foreach ($listings as $listing)

<h2>
<a href="/listings/{{$listing["id"]}}">
{{$listing}}
{{$listing['title']}}
</a>
</h2>
<p>
 {{$listing['description']}}
</p>
@endforeach
@endunless

