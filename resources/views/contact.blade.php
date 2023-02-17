@extends('layouts.app')

@section('content')
    {{--    contact form for the customer in tailwind--}}
    <section class="bg-white">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 ">
                Contact Us
            </h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 sm:text-xl">Got a technical
                issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us
                know.</p>
            <form action="{{route('post_feedback')}}" class="space-y-8" method="post">
                @csrf
                <div>
                    <label for="name"
                           class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" id="subject"
                           name="name"
                           class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500"
                           placeholder="Let us know how we can help you" required>
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                        email</label>
                    <input type="email" id="email"
                           name="email"
                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                           placeholder="Email..." required>
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                        message</label>
                    <textarea id="message" rows="6"
                              name="feedback"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                              placeholder="Leave a comment..."></textarea>
                    @error('feedback')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit"
                        class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-secondary sm:w-fit hover:bg-primary-800 focus:outline-none">
                    Send message
                </button>
            </form>
        </div>
    </section>
@endsection
