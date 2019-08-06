@extends('layouts.base')
@push('appTitle', 'Cutomer')
@push('appHeader')
@endpush
@push('appFooter')
<script src="{{ asset('js/master/customer.js') }}" type="text/javascript"></script>
@endpush
@section('baseContent')

<div class="h-100 w-100 m-1 d-flex flex-column justify-content-center align-items-center bg-master-light">
    <div class="h-100 w-90 bg-master-lighter">
        <div class="h-100 w-100 d-flex flex-column">
            <div class="notif"></div>
            <div class="w-10">
                <button class="btn btn-complete btn-block btn-compose" data-target="#modalFormCustomer"
                    data-toggle="modal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-condensed" id="detailedTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>EDIT | DELETE</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FORM -->
<div class="modal fade fill-in" id="modalFormCustomer" tabindex="-1" role="dialog" aria-labelledby="modalFormCustomerLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close"></i></button>
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-left p-b-5"><span class="semi-bold">Customer</span></h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">

                <form method="POST" id="form-customer">
                  @csrf

                  <input type="text" name="id" class="form-control" id="id" hidden>

                  <div class="form-group">
                    <label>Customer name</label>
                    <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Customer Name" required>
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
                  </div>

                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" required>
                  </div>


                  <div class="form-group">
                    <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-complete">Save</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- END MODAL FORM -->
<!-- MODAL CONFIRM  -->
<div class="modal fade stick-up" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" data-id="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="pg-close fs-14"></i>
                </button>
                <h5><span class="semi-bold">Are you sure, you want to delete ?</span></h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">No</button>
                  <button class="btn btn-complete">Yes</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END MODAL CONFIRM  -->
@endsection
