<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $laundryType->name }}</p>
</div>

<!-- Category Field -->
<div class="col-sm-12">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $laundryType->category?->name }}</p>
</div>

<!-- Service Price Field -->
<div class="col-sm-12">
    {!! Form::label('service_price', 'Service Price:') !!}
    <p>
        @foreach ($laundryType->services as $service)
            <span class="text-capitalize">{{ $service->name }}</span> : {{ $service->pivot->price }},
        @endforeach
    </p>
</div>
