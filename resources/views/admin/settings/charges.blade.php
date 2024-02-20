@extends('layouts.master')
@section("title","Branches")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Charges</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Charges</a>
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
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            @include('partial._alerts')
            <div class="card card-custom gutter-b">
                <div class="flex-wrap card-header">
                    <div class="card-title">
                        <h3 class="kt-portlet__head-title">
                            Service Charges
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:void(0)" class="btn btn-primary"
                           data-toggle="modal"
                           data-target="#addModal">
                            <i class="la la-plus"></i>
                            New Charge
                        </a>
                    </div>
                    <!--end::Dropdown-->

                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        {{ $dataTable->table() }}
                    </div>

                </div>


                {{--Service Provider  modal--}}
                <div data-backdrop="static" class="modal fade " id="addModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new Charge</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="add-service-charge-form" action="{{route('admin.charges.store')}} "
                                  method="POST">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <div class="form-group">
                                                <label>Service Provider</label>
                                                <select name="provider_id" class="form-control" id="provider">
                                                    <option value="" class="form-control" disabled selected>---Choose Provider----</option>
                                                    @foreach($providers as $provider)
                                                        <option value="{{$provider->id}}" class="form-control">{{$provider->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label>Service</label>
                                            <select name="service_id" class="form-control" id="service">
                                                <option value="" class="form-control" disabled selected>---Choose Service----</option>

                                                @foreach($services as $service)
                                                    <option value="{{$service->id}}" class="form-control">{{$service->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-12 form-group">
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" name="customer_charge" value="1" id="customer_charge">
                                                <span></span>Does Charge Customer?  </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label>Charge Type</label>
                                            <select name="charge_type" class="form-control" id="charge-type" disabled>
                                                <option value="" class="form-control" disabled selected>---Choose Charge Type----</option>

                                                <option value="Flat" class="form-control">Flat</option>
                                                <option value="Percentage" class="Percentage" selected>Percentage</option>
                                                <option value="Range" class="Range">Range</option>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group" id="add-charge">
                                            <label>Charges</label>
                                            <input class="form-control" type="number" step="any" name="charge" id="charge" placeholder="Enter Charge">
                                        </div>
                                    </div>
                                    <div class="row" id="add-charges-container">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="min">Min</label>
                                                <input type="number" step="any" class="form-control" name="min[]" value="{{ old('min') }}"  >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="max">Max</label>
                                                <input type="number" step="any" class="form-control" name="max[]" value="{{ old('max') }}"  >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="charges">Charges</label>
                                                <input type="number" step="any" class="form-control" name="charges[]" value="{{ old('charges') }}"  >
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="end_date">&nbsp;</label>
                                                <button type="button" name="add" id="add" class="form-control bg-primary px-auto mx-auto"><i class="la la-plus text-white"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dynamic_field">
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                    </button>
                                    <button type="submit" class="btn btn-primary"><span
                                            class="la la-check-circle-o"></span>
                                        Save
                                    </button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--user update modal--}}

                <div data-backdrop="static" class="modal fade " id="charge-update" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Service Charges</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="charge-update-form" action=" "
                                  method="POST">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class=" form-group">
                                        <div class="form-group">
                                            <label>Service Provider</label>
                                            <select name="provider_id" class="form-control" id="_provider">
                                                <option value="" class="form-control" disabled selected>---Choose Provider----</option>
                                            @foreach($providers as $provider)
                                                    <option value="{{$provider->id}}" class="form-control">{{$provider->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label>Service</label>
                                        <select name="service_id" class="form-control" id="_service">
                                            <option value="" class="form-control" disabled selected>---Choose Service----</option>

                                        @foreach($services as $service)
                                                <option value="{{$service->id}}" class="form-control">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row col-12 form-group">
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" name="customer_charge" value="1" id="_customer_charge">
                                                <span></span>Does Charge Customer?  </label>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label>Charge Type</label>
                                        <select name="charge_type" class="form-control" id="_charges_type">
                                            <option value="Flat" class="form-control">Flat</option>
                                            <option value="Percentage" class="form-control">Percentage</option>
                                            <option value="Range" class="Range">Range</option>
                                        </select>
                                    </div>
                                    <div id="range-container">
                                        <div class="form-group">
                                            <label>Min</label>
                                            <input type="number" step="any" name="min" class="form-control" id="_min">
                                        </div>
                                        <div class="form-group">
                                            <label>Max</label>
                                            <input type="number" step="any" name="max" class="form-control" id="_max">
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <label>Charges</label>
                                        <input class="form-control" type="number" step="any" name="charge" id="_charges" placeholder="Enter Charge">
                                    </div>

                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                    </button>
                                    <button type="submit" class="btn btn-primary"><span
                                            class="la la-check-circle-o"></span>
                                        Update Charge
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





            </div>

        </div>
    </div>


@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateServiceCharges::class,'#add-service-charge-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateUpdateServiceCharges::class,'#charge-update-form') !!}
    {{ $dataTable->scripts() }}


    <script>
        $(".nav-all-service-charges").addClass("menu-item-active");
        $(function (){
            $('#add-charges-container').hide();
            $('#dynamic_field').hide();
            //disable the charges input array field
          // $("[name='charges[]'").attr('disabled',true);
        })
        $('#charge-update').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget);
            console.log(button);
            var href = button.data('url');
            $("#_service").val($(button).data("service"));
            $("#_provider").val($(button).data("service_provider"));
            $("#_charges_type").val($(button).data("charges_type"));
            $("#_charges").val($(button).data("charges"));
            $("#_min").val($(button).data("min"));
            $("#_max").val($(button).data("max"));
            $("#_customer_charge").val($(button).data("customer_charge"));
            console.log("customer charge :"+$(button).data("customer_charge"));
            if($(button).data("customer_charge") == 1){
                $("#_customer_charge").prop('checked',true);
            }else{
                $("#_customer_charge").prop('checked',false);
            }
            $("#_customer_charge").trigger('change');


            if($(button).data("charges_type") == 'Range'){
                $("#range-container").show();
            }else {
                $("#range-container").hide();
            }

            $('#charge-update-form').attr("action", $(this).data('url'));
            var modal = $(this);
            modal.find('form').attr('action', href)
        })

        $(document).on('click','.delete-button', function (e){
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title:'Are you sure!',
                text:'This Service Charge Will be Deleted!',
                icon:'warning',
                showCancelButton:true,
                showConfirmButton:true
            }).then(function(result){
                if(result.isConfirmed){
                    let link = btn.attr('href');
                    window.location.href = link;

                }
            })
        })

        var i=1;
        $(document).on('click','#add',function(){
            i++;
            new_field = `
                <div id="row${i}" class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="min">Min:</label>
                            <input required type="number" step="any" name="min[]" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="max">Max:</label>
                            <input required type="number" step="any" name="max[]" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="charges">Charges:</label>
                            <input required type="number" step="any" name="charges[]" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-1 btn_remove" id="${i}">
                        <div class="form-group">
                            <label for="add_btn">&nbsp;</label>
                            <button type="button" name="add" id="add" class="form-control bg-danger px-auto"><i class="la la-minus text-white"></i></button>
                        </div>
                    </div>
                    </div>
                        `;
            $('#dynamic_field').append(new_field);
        });
        $(document).on('click', '.btn_remove', function(){
            $(this).closest('#row'+$(this).attr('id')).remove();
        });
        $(document).on('change','#charge-type',function(){
            console.log('here')
            if($(this).val() != 'Range'){
                $('#dynamic_field').hide();
                $('#add-charges-container').hide();
                $('#add-charge').show();
                $()
            }else{
                $('#dynamic_field').show();
                $('#add-charges-container').show();
                $('#add-charge').hide();
            }
        })
        $(document).on('change','#_charges_type',function(){
            if($(this).val() != 'Range'){
                $('#range-container').hide();
            }else{
                $('#range-container').show();
            }
        })
        $(document).on('change','#customer_charge',function(){
            console.log($(this).val());
            if($(this).is(':checked')){
                $(this).val(1);
                //all charge types are allowed
                $('#charge-type').attr('disabled',false);
            }else{
                $(this).val(0);
                //charge type must be percentage only
                $('#charge-type').val('Percentage');
                $('#charge-type').attr('disabled',true);
            }
        })
        $('#add-service-charge-form').on('submit', function() {
            $('#charge-type').prop('disabled', false);
        });
        $(document).on('change','#_customer_charge',function(){
            console.log($(this).val());
            if($(this).is(':checked')){
                $(this).val(1);
                //all charge types are allowed
                $('#_charges_type').attr('disabled',false);
            }else{
                $(this).val(0);
                //charge type must be percentage only
                $('#_charges_type').val('Percentage');
                $('#_charges_type').attr('disabled',true);
            }
        })
        $('#charge-update-form').on('submit', function() {
            $('#_charges_type').prop('disabled', false);
        });
    </script>

@endsection
