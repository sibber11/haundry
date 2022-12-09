<div class="service-name">
    <h2>Customer Reviews</h2>
</div>
@php
    $feedbacks = \App\Models\Feedback::where('show', true)->limit(3)->get();
@endphp
<div id="reviews" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
    @foreach($feedbacks as $feedback)
        <x-review :feedback="$feedback"></x-review>
    @endforeach
</div>
