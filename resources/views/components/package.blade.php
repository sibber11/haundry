<div class="p-6 bg-white rounded shadow w-full">
    <div class="leading-9">
        <h4 class="text-lg font-bold text-center">{{$package->name}}</h4>
        <div class="flex justify-between"><span>Price:</span> <strong>{{$package->price}}</strong></div>
        <div class="flex justify-between"><span>Points:</span> <strong>{{$package->points}}</strong></div>
        <div class="flex justify-between"><span>Save:</span> <strong>{{$package->points - $package->price}}</strong>
        </div>

    </div>
    <div class="text-center mt-3">
        <a href="{{route('package', $package)}}" class="p-2 bg-macaw-900 text-white rounded">Buy Now</a>
    </div>
</div>
