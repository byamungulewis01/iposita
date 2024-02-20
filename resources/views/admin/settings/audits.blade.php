
@extends("layouts.master")
@section("title",'IPOSITA | Audits')
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">System Audits</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);" class="text-muted">Audits</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--end::Toolbar-->
        </div>
    </div>
@stop

@section("content")

    <!--end::Notice-->
    @include('partial._alerts')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">System Audits</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.system-audits.index') }}">
                <div class="row mb-5">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="start_date" class="control-label">start date</label>
                            <input id="start_date" readonly type="text" value="{{request('start_date')}}" name="start_date" class="form-control start end-today-datepicker" required>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="end_date" class="control-label">End Date</label>
                            <input id="end_date" readonly type="text" class="form-control end end-today-datepicker" value="{{request('end_date')}}" name="end_date" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="event" class="control-label">Events</label>
                            <select class="form-control" name="event" id="event">
                                <option value="">--Select Event--</option>
                                <option {{request('event')=='created'?'selected':''}} value="created">Created</option>
                                <option {{request('event')=='deleted'?'selected':''}} value="deleted">Deleted</option>
                                <option {{request('event')=='updated'?'selected':''}} value="updated">Updated</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="event" class="control-label">Model Accessed</label>
                            <input name="model" class="form-control" value="{{request('model')}}">
                        </div>
                    </div>
                    <div>
                        <button type="submit"  class="btn btn-primary" style="color: white;margin-top: 25px"> view Audits</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                    <thead>
                    <tr>
                        <th >#</th>
                        <th >Done By</th>
                        <th>Event</th>
                        <th>Model Accessed</th>
                        <th>Old_values</th>
                        <th>New_values</th>
                        <th>Done_At</th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{asset("assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3")}}"></script>
    <script>

        $('.nav-settings').addClass('menu-item-active  menu-item-open');
        $('.nav-audits').addClass('menu-item-active');
        $('#kt_datatable1').DataTable({
            processing: true,
            serverSide: true,
            "deferRender": true,
            ajax: "{{ route('admin.system-audits.index') }}"+"?"+$('form').serialize(),
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'user_name', name: 'user.name'},
                {data: 'event', name: 'event'},
                {data: 'model', name: 'auditable_type'},
                {data: 'formatted_old_values', name: 'old_values'},
                {data: 'formatted_new_values', name: 'new_values'},
                {data: 'created_at', name: 'created_at'},
            ],
            'order':[[6,'desc']]
        });
    </script>
@endsection

