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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Link Estate agent with Solicitor</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Between Estate agent and Solicitor</li>
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
    <form action="{{url('admin/LinkESPost')}}" method="post">
        @csrf
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Link Estate agent with Solicitor</h3>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-row">
                        <label>Estate Agent</label>
                        <select type="text" class="form-control" id="estate_agent" name="estate_agent" required="">
                            <?php $estate_agents = DB::table("estate_agents")->get();?>
                            <option value="" disabled="" selected="">Select estate agent</option>
                            @foreach ($estate_agents as $estate_agent)
                            <option value="{{$estate_agent->id}}">{{$estate_agent->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group form-row">
                        <label>Solicitor</label>
                        <select type="text" class="form-control" id="solicitor" name="solicitor[]" data-placeholder="Choose many.." multiple>
                            <?php $solicitors = DB::table("solicitors")->get();?>
                            @foreach ($solicitors as $solicitor)
                            <option value="{{$solicitor->id}}">{{$solicitor->name}}</option>
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
    $("#estate_agent").select2();
    $("#solicitor").select2();

    var estate_agent = localStorage.getItem("estate_agent");
    if (estate_agent != undefined)
    {
        $("#estate_agent option[value="+ estate_agent +"]").prop("selected", true);
        $("#estate_agent").select2();
        
        setSolicitor(estate_agent); 
    } 



    $("#estate_agent").change(function(){

        var id = $(this).val();
        setSolicitor(id);

    });

    function setSolicitor(estate_agent){

        $("#solicitor option").prop("selected", false);
        $("#solicitor").select2();

        var id = estate_agent;
        localStorage.setItem("estate_agent", id);

        $.ajax({
            url:"{{url('/admin/GetESSelected')}}",
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id:id},
            success:function(req) {
                var selected = JSON.parse(req);
                var solicitors = selected?selected.split(','):"";

                if (solicitors != ""){
                    solicitors.forEach(function(key){
                        $("#solicitor option[value="+ key +"]").prop("selected", true);
                        $("#solicitor").select2();
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
