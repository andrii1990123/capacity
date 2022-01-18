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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Firm Capacity</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Manage firm capacity</li>
                    <li class="breadcrumb-item active" aria-current="page">Solicitor capacity list</li>
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
            <h3 class="block-title">Firm Capcity</h3>
        </div>
        <div class="block-content">
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons" id="product-table">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Firm Name</th>
                            <th style="width: 15%;">Current Capacity</th>
                            <th style="width: 20%;">Last updated</th>
                            <th style="width: 15%;">Weekly Capacity</th>
                            <th style="width: 10%;">Turn Firm Off</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $index = 1;
                            $solicitors = DB::table("solicitors")->get();
                            foreach ($solicitors as $solicitor) {
                        ?>
                        <tr data-id="{{$solicitor->id}}" data-capacity="{{$solicitor->capacity}}" data-weekly_capacity="{{$solicitor->weekly_capacity}}">
                            <td>
                                {{$index ++}}
                            </td>
                            <td>
                                {{$solicitor->name}}
                            </td>
                            <td>
                                <span>{{$solicitor->capacity}}</span>
                                <a href="#" data-toggle="modal" data-target="#modal-edit-capacity" style="float: right;" class="edit-capacity"> <i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                {{$solicitor->last_updated}}
                            </td>
                            <td>
                                <span>{{$solicitor->weekly_capacity}}</span>
                                <a href="#" data-toggle="modal" data-target="#modal-edit-weekly-capacity" style="float: right;" class="edit-weekly-capacity"> <i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <div class="custom-control custom-switch mb-1">
                                    <input type="checkbox" class="custom-control-input firmstate" id="turn{{$solicitor->id}}" @if($solicitor->status == 1) checked="" @endif>
                                    <label class="custom-control-label" for="turn{{$solicitor->id}}"></label>
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
<div class="modal" id="modal-edit-capacity" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('admin/EditCurrentCapacity')}}" method="post">
                @csrf
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Edit Capacity</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p style="margin-bottom: 0px;">Currrent Capacity</p>
                    <input name="id" hidden="" />
                    <input type="number" name="capacity" id="capacity" class="form-control"/>
                </div>
                <div class="block-content block-content-full text-right bg-light">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="modal-edit-weekly-capacity" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('admin/EditWeeklyCapacity')}}" method="post">
                @csrf
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Edit Weekly Capacity</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p style="margin-bottom: 0px;">Weekly Capacity</p>
                    <input name="id" hidden="" />
                    <input type="number" name="weekly_capacity" id="weekly_capacity" class="form-control"/>
                </div>
                <div class="block-content block-content-full text-right bg-light">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
            </form>
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
    $(document).on('click', ".edit-capacity", function(){
        var id = $(this).parent().parent().data('id');
        $("#capacity").val($(this).parent().parent().data('capacity'));
        $("#modal-edit-capacity input[name=id]").val(id);
    });
    $(document).on('click', ".edit-weekly-capacity", function(){
        var id = $(this).parent().parent().data('id');
        $("#weekly_capacity").val($(this).parent().parent().data('weekly_capacity'));
        $("#modal-edit-weekly-capacity input[name=id]").val(id);
    });
    $(document).on('change', ".firmstate", function(){
        var current_val = $(this).prop("checked");
        var id = $(this).parent().parent().parent().data('id');
        $.ajax({
            url:"{{url('/admin/SetFirmState')}}",
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id:id, val:current_val==true?1:0},
            success:function(req) {
                console.log("success");
            },
            error: function(ts) {
                console.log(ts);
            }
        });
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
    

    setInterval(setCapacityRealtime, 2000);
    function setCapacityRealtime() {
        $.ajax({
            url:"{{url('/admin/GetCapcity')}}",
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {},
            success:function(req) {
                var solicitors = JSON.parse(req);
                solicitors.forEach(function(solicitor){
                    $("tr[data-id='"+ solicitor.id +"'] td:nth-child(3) span").text(solicitor.capacity);
                });
            },
            error: function(ts) {
                console.log(ts);
            }
        });
    }
</script>
@endsection
