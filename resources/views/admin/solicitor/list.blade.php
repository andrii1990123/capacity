@extends('admin.layout.default')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
<style type="text/css">
    .row>div{
        padding-bottom: 5px;
    }
</style>
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Solicitor</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Manage Solicitor</li>
                    <li class="breadcrumb-item active" aria-current="page">Solicitor List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->
<div class="content">
    <!-- Full Table -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Solicitor Info</h3>
            <div class="block-options">
                <a href="{{url('admin/Solicitor/Add')}}" class="btn btn-hero-sm btn-hero-primary" data-toggle="tooltip" title="Add new"><i class="fa fa-plus fa-2x" style="font-size: 15px;"></i> Add</a>
            </div>
        </div>
        <div class="block-content">
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons" id="product-table">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 10%;">Branch Name</th>
                            <th style="width: 15%;">Address</th>
                            <th style="width: 10%;">County</th>
                            <th style="width: 5%;">Post code</th>
                            <th style="width: 15%;">Note</th>
                            <th style="width: 5%;">New Build</th>
                            <th style="width: 5%;">Auction Property</th>
                            <th style="width: 5%;">Company Transaction</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $index = 1;
                            foreach ($solicitors as $solicitor) {
                        ?>
                        <tr data-id="{{$solicitor->id}}">
                            <td>
                                {{$index ++}}
                            </td>
                            <td>
                                {{$solicitor->name}}
                            </td>
                            <td>
                                {{$solicitor->branch_name}}
                            </td>
                            <td>
                                {{$solicitor->address1}}<br/>
                                {{$solicitor->address1}}<br/>
                                {{$solicitor->address1}}
                            </td>
                            <td>
                                {{$solicitor->county}}
                            </td>
                            <td>
                                {{$solicitor->postcode}}
                            </td>
                            <td>
                                {{$solicitor->branch_manager}}
                            </td>
                            <td>
                                @if ($solicitor->new_build)
                                    <span style="color:#82b54b;"><i class="fa fa-check"></i></span>
                                @endif
                            </td>
                            <td>
                                @if ($solicitor->auction_property)
                                    <span style="color:#82b54b;"><i class="fa fa-check"></i></span>
                                @endif
                            </td>
                            <td>
                                @if ($solicitor->company_transaction)
                                    <span style="color:#82b54b;"><i class="fa fa-check"></i></span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit" href="{{url('/admin/Solicitor/Edit/'.$solicitor->id)}}">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-primary remove" data-toggle="modal" data-target="#modal-block-normal" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Full Table -->
</div>
<div class="modal" id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Remove Solicitor</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form action="{{url('admin/Solicitor/Remove')}}" method="post">
                    @csrf
                    <input name="id" hidden="" />
                <div class="block-content">
                    <p>Are you sure to remove this solicitor?</p>
                </div>
                <div class="block-content block-content-full text-right bg-light">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Done</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script>
jQuery(function(){ Dashmix.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs', 'pw-strength']); });
</script>
<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parent().parent().parent().attr("data-id");
        $("input[name=id]").val(id);
    });
    $("#product-table").dataTable({
                        order: [[ 0, "asc" ]],
                        pageLength: 20,
                        lengthMenu: [
                            [5, 10, 20, 50, 100],
                            [5, 10, 20, 50, 100]
                        ],
                        autoWidth: !1,
                        buttons: [{
                            extend: "copy",
                            className: "btn btn-sm btn-primary"
                        }, {
                            extend: "csv",
                            className: "btn btn-sm btn-primary"
                        }, {
                            extend: "print",
                            className: "btn btn-sm btn-primary"
                        }],
                        dom: "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
                    });
    
</script>
@endsection
