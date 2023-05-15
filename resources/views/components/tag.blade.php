@props(['tages'])
@php
    $tage=explode(",",$tages);
@endphp
<ul class="flex">
    @foreach ($tage as $item)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?tage={{$item}}">{{$item}}</a>
        </li>
    @endforeach
</ul>