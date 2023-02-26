@php
    $banners = \App\Models\Banner::where('show', true)->get();
@endphp

@if($banners->count())
    <div class="container items-center max-w-7xl px-5 pb-5 mx-auto mt-16 text-center">
        <Slideshow :images="{{$banners}}"></Slideshow>
    </div>
@endif
