@extends('Layout')

@section('content')
@guest
@include('Part._hero')
@endguest
@include('Part._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@if(count($list)>0)

    @foreach ($list as $item)
    <div class="bg-gray-50 border border-gray-200 rounded p-6">
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{(!is_null($item['logo']))?asset("storage/".$item['logo']):asset("image/no-image.png")}}"
                alt=""
            />
            <div>
                <h3 class="text-2xl">
                    <a href="/listing/{{$item["id"]}}">{{$item['title']}}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{$item['company']}}</div>
                <x-tag tages="{{ $item['tags'] }}" />
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i>
                    {{$item['location']}}
                </div>
            </div>
        </div>
    </div>
        
    @endforeach
    {{$list->links()}}

        
    @else
        <p>No listing found</p>

    @endunless
</div>
@endsection
