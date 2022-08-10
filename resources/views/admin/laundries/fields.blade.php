
@php
$laundry_types = App\Models\LaundryType::all()->pluck('name', 'id');
@endphp
<div class="form-group col-sm-12">

</div>
<!-- Laundry Type Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('laundry_type_id', 'Laundry Type:') !!}
    {!! Form::select('', $laundry_types, null, [
        'class' => 'form-control pop',
        'id' => 'laundry_type',
        'placeholder' => 'Select Laundry...',
    ]) !!}
</div>

<!-- Service Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('service_type', 'Service Type:') !!}
    {!! Form::select('', ['iron', 'dry_wash', 'wash', 'wash_iron'], null, ['class' => 'form-control', 'id' => 'service_type']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-3">
    {!! Form::label('amount', 'Amount') !!}
    {!! Form::number('', 1, ['class' => 'form-control', 'id' => 'amount']) !!}
</div>
<div class="form-group col-sm-1">
    {!! Form::label('', 'Action') !!}
    <button id="add" class="btn btn-success" type="button">
        Add
    </button>
</div>


<table class="table table-striped">
    <thead class="">
        <tr>
            <th>Laundry Type</th>
            <th>Service Type</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="laundries">
    </tbody>
</table>

@push('page_scripts')
    <script type="text/javascript">

        $('.pop').popover({
            content: 'This field is required!',
            placement: 'top',
            contianer: 'body',
            trigger: 'manual'
        })
        $('#laundry_type').focus(function(){
            $('.pop').popover('hide');
        })
        let num = 0;
        $('.rmv').click(function() {
            $(this).parent().parent().remove();
        })
        $('#add').click(function() {
            let laundry_id = $('#laundry_type').val();
            if (laundry_id == '') {
                $('.pop').popover('show');
                return;
            }
            let laundry_type = $('#laundry_type option:selected').text();
            let service_type = $('#service_type option:selected').text();
            let service_id = $('#service_type').val();
            let amount = $('#amount').val();
            let product =
                `<tr>
                <td scope="row">
                    <input type="hidden" name="items[${num}][laundry_type_id]" value="${laundry_id}">
                    ${laundry_type}
                </td>
                <td>
                    <input type="hidden" name="items[${num}][service_type]" value="${service_id}">
                    ${service_type}
                </td>
                <td>
                    <input type="hidden" name="items[${num}][amount]" value="${amount}">
                    ${amount}
                </td>
                <td>
                    <button type="button" class="btn btn-danger rmv"><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
                </td>
            </tr>`;
            $('#laundries').append(product);
            num++;
            $('.rmv').click(function() {
                $(this).parent().parent().remove();
            });
            $('#laundry_type').val(null);
            $('#amount').val(1);
        })
    </script>
@endpush
