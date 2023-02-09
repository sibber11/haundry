@php
    $packages = \App\Models\Package::all();
@endphp

@if($packages->isNotEmpty())
    <div class="service-name">
        <h2>Packages</h2>
    </div>
    <div id="packages" class="flex flex-col sm:flex-row gap-3 my-1.5 justify-around">
        @foreach($packages as $package)
            {{--        @dd($package)--}}
            <x-package :package="$package"></x-package>
        @endforeach
    </div>
@endif
