<h1> {{ $header }}</h1>

@unless (count($listings)==0)

@foreach ($listings as $listing)


<a href="/listings/{{ $listing['id'] }}">
  
{{ $listing['title'] }}
</a>

<p>{{ $listing['description'] }}</p>
  
@endforeach
    

@else
<h1> no listings available</h1>

@endunless
