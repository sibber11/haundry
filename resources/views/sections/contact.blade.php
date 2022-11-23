<div class="service-name">
    <h2>
        Contact Us
    </h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 sm:bg-gradient-to-l sm:from-white sm:to-transparent sm:via-gray-200">
    <form action="{{route('post_feedback')}}" method="post">
        @csrf
        <div class="mt-1 flex flex-col gap-2">
            <label for="contact-name ">Name: </label>
            <input type="text" name="name" id="contact-name" class="p-2 rounded">
        </div>
        <div class="mt-1 flex flex-col gap-2">
            <label for="contact-email ">Email: </label>
            <input type="email" name="email" id="contact-email" class="p-2 rounded">
        </div>
        <div class="mt-1 flex flex-col gap-2">
            <label for="contact-info ">Your Feedback: </label>
            <textarea name="info" cols="30" rows="10" id="contact-info" class="p-2 rounded"></textarea>
        </div>
        <div class="mt-2">
            <button class="rounded p-2 bg-macaw-900 text-white">Send</button>
        </div>
    </form>
    <div class="text-[20rem] text-center text-macaw-900 hidden sm:block">
        <i class="fa fa-phone"></i>
    </div>
</div>
