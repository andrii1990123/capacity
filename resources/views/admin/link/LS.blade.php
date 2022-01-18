@extends('admin.layout.default')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}">
<style type="text/css">
    .error-note{
        color:red;
    }
</style>
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Link Solicitor with Lender</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Between Solicitor and Lender</li>
                    <li class="breadcrumb-item active" aria-current="page">Link</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Elements -->
    <form action="{{url('admin/LinkLSPost')}}" method="post">
        @csrf
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Link Solicitor with Lender</h3>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-row">
                        <label>Solicitor</label>
                        <select type="text" class="form-control" id="solicitor" name="solicitor" required="">
                            <?php $solicitors = DB::table("solicitors")->get();?>
                            <option value="" disabled="" selected="">Select solicitor</option>
                            @foreach ($solicitors as $solicitor)
                            <option value="{{$solicitor->id}}">{{$solicitor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group form-row">
                        <label>Lender</label>
                        <select type="text" class="form-control" id="lender" name="lender[]" data-placeholder="Choose many.." multiple>
                            <?php $lenders = DB::table("lenders")->get();?>
                            @foreach ($lenders as $lender)
                            <option value="{{$lender->id}}">{{$lender->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <h2 class="content-heading"></h2>
            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-12" style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Link</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- END Elements -->
</div>
@endsection

@section('js')
<script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
<script>    
    $("#lender").select2();
    $("#solicitor").select2();

    var solicitor = localStorage.getItem("solicitor");
    if (solicitor != undefined)
    {
        $("#solicitor option[value="+ solicitor +"]").prop("selected", true);
        $("#solicitor").select2();
        
        setLender(solicitor); 
    } 



    $("#solicitor").change(function(){

        var id = $(this).val();
        setLender(id);

    });

    function setLender(solicitor){

        $("#lender option").prop("selected", false);
        $("#lender").select2();

        var id = solicitor;
        localStorage.setItem("solicitor", id);

        $.ajax({
            url:"{{url('/admin/GetLSSelected')}}",
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id:id},
            success:function(req) {
                var selected = JSON.parse(req);
                var lenders = selected?selected.split(','):"";

                if (lenders != ""){
                    lenders.forEach(function(key){
                        $("#lender option[value="+ key +"]").prop("selected", true);
                        $("#lender").select2();
                    }); 
                }  
            },
            error: function(ts) {
                console.log(ts);
            }
        });
    }

</script>
@endsection
