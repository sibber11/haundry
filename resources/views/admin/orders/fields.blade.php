@php
$customers = App\Models\Customer::all()->pluck('name', 'id');
@endphp
<!-- Customer Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('customer_id', 'Customer Name:') !!}
    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-4">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control', 'required', 'disabled']) !!}
</div>

<!-- Deadline Field -->
<div class="form-group col-sm-4">
    {!! Form::label('deadline', 'Deadline:') !!}
    {!! Form::text('deadline', Carbon\Carbon::tomorrow(), ['class' => 'form-control', 'id' => 'deadline']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#deadline').datepicker({
            todayHighlight: true,
            todayBtn: true,
            time: true,
        })
    </script>
@endpush