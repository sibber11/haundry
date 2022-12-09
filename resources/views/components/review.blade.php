<div class="shadow">
    <div class="py-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
        <div class="flex flex-wrap items-center">
            <img class="mr-6" src="{{asset('images/logo.png')}}" alt="user profile image" style="max-width: 50px;">
            <h4 class="w-full md:w-auto text-xl font-heading font-medium">{{$feedback->name}}</h4>
            <div class="w-full md:w-px h-2 md:h-8 mx-8 bg-transparent md:bg-gray-200"></div>
        </div>
    </div>
    <div class="px-4 overflow-hidden md:px-16 bg-white">
        <div class="flex flex-wrap">
            <div class="w-full md:w-2/3 md:mb-0">
                <p class="max-w-2xl leading-loose py-2">
                    {{$feedback->feedback}}
                </p>
            </div>
        </div>
    </div>
</div>
