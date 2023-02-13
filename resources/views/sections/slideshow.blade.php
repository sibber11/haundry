{{--<!-- Slideshow container -->--}}
{{--<div class="slideshow-container">--}}
@php
    $banners = \App\Models\Banner::where('show', true)->get();
@endphp
{{--        <!-- Full-width images with number and caption text -->--}}
{{--    @foreach($banners as $banner)--}}
{{--        <div class="mySlides fade">--}}
{{--            <div class="numbertext">{{$loop->index}} / {{$banners->count()}}</div>--}}
{{--            <img src="{{asset($banner->image)}}" style="width:100%; max-height: 400px;" alt="banner">--}}
{{--            <div class="text">{{$banner->caption}}</div>--}}
{{--        </div>--}}
{{--    @endforeach--}}

{{--    <!-- Next and previous buttons -->--}}
{{--    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>--}}
{{--    <a class="next" onclick="plusSlides(1)">&#10095;</a>--}}
{{--</div>--}}
{{--<br>--}}

{{--<!-- The dots/circles -->--}}
{{--<div style="text-align:center">--}}
{{--    @foreach($banners as $banner)--}}
{{--        <span class="dot" onclick="currentSlide({{$loop->index+1}})"></span>--}}
{{--    @endforeach--}}
{{--</div>--}}
<!-- component -->
@if($banners->count())
    <div class="container items-center max-w-7xl px-5 pb-5 mx-auto mt-16 text-center">
        <Slideshow :images="{{$banners}}"></Slideshow>
    </div>
@endif


