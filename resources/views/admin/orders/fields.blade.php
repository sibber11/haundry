@php
$customers = App\Models\Customer::all()->pluck('name', 'id');
@endphp
<!-- Customer Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('customer_id', 'Customer Name:') !!}
    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Field -->
{{-- <div class="form-group col-sm-4">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control', 'required', 'disabled']) !!}
</div> --}}

<!-- Deadline Field -->
<div class="form-group col-sm-4">
    {!! Form::label('deadline', 'Deadline:') !!}
    {!! Form::text('deadline', Carbon\Carbon::now()->add('days', 1), ['class' => 'form-control', 'id' => 'deadline']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
    $('#customer_id').select2({
            ajax: {
                url: "?customer",
                data: function(params) {
                    var query = {
                        q: params.term,
                    }
                    return query;
                },
                processResults: function(data) {
                    let r = $.map(data.results, function(obj) {
                        obj.text = obj.text || obj.name;
                        return obj;
                    })
                    return {
                        results: r
                    };
                },
            },
            delay: 250,
            dataType: 'json',
            cache: true,
        });
        $('#deadline').datetimepicker({
            todayHighlight: true,
            todayBtn: true,
            startDate: "{{Carbon\Carbon::today()}}",
        })
    </script>
@endpush
