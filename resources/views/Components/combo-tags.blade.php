@props(['comboTagsCsv'])
@php
  $comboTags = explode(',', $comboTagsCsv)
@endphp

<a href="javascript:;" class="me-1">
  @foreach ($comboTags as $comboTag )
  <span >
     
     <a class="badge bg-label-success" href="/?combotag={{ $comboTag }}">{{ $comboTag }}</a>   
     
  </span>
  @endforeach
</a>