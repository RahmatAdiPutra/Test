@extends('layouts.base')
@push('appTitle', 'Sales Transaction')
@push('appHeader')
@endpush
@push('appFooter')
<script src="{{ asset('js/transaction/sales-detail.js') }}" type="text/javascript"></script>
@endpush
@section('baseContent')

<div class="h-100 w-100 m-1 d-flex flex-column justify-content-center align-items-center bg-master-light">
    <div class="h-100 w-90 bg-master-lighter">
        <div class="h-100 w-100 d-flex flex-column">
            <div class="m-1 bg-master-lighter" id="form-transaction">
                <label>Document Number</label>
                <div class="form-group">
                    <input type="text" name="id" class="form-control" id="id" disabled required>
                </div>

                <label>Transaction Date</label>
                <div class="form-group">
                    <input type="text" name="sales_date" class="form-control" id="sales_date" disabled required>
                </div>

                <label>Customer</label>
                <select name="customer_id" class="full-width" id="customer_id" data-init-plugin="select2" required>
                </select>
            </div>
        </div>
    </div>
</div>
@endsection
