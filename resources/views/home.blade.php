@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}">
<style>
    .select2-search__field{
        outline: none;
    }
    .select2-selection__rendered{
        font-family: sans-serif;
    }
    .select2-results__option{
        font-family: sans-serif;
    }
    .select2-selection{
        height: 30px !important;
    }
    .select2-selection{ 
        height: 40px !important;  
    }
    .select2-selection__arrow{
        margin-top: 5px;
    }
    .select2-selection__rendered{
        margin-top: 5px;
    }
    .empty{
        font-family: sans-serif;
        color: red;
        font-size: 16px;
    }
    .exist{
        font-family: sans-serif;
        color: green;
        font-size: 18px;
    }
    .solicitor-card{
        background-color: white;
        padding: 5px 10px 5px 10px;
        border-radius: 5px;
        border: 1px solid #e6ebf4;
    }
    .solicitor{
        padding: 15px 5px 5px 5px;
        border-bottom: 1px solid rgb(240,240,240);
    }
    .solicitor p{
        font-family: sans-serif;
        color: black;
        font-size: 18px;
    }
</style>
@endsection

@section('content')
<div class="container contact-form">
    <div class="form-group form-row">
        <label>Estate Agent</label>
        <select type="text" class="input-group" id="estate_agent" name="estate_agent" required="">
            <?php $estate_agents = DB::table("estate_agents")->get();?>
            <option value="" disabled="" selected="">Select estate agent</option>
            @foreach ($estate_agents as $estate_agent)
            <option value="{{$estate_agent->id}}">{{$estate_agent->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group form-row" style="padding-top: 30px;">
        <span>Is the property a new build?</span>
        <div class="form-group" style="margin-left: 70px;">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="example-radios-inline1" name="new_build" value="yes" checked="">
                <label class="form-check-label" for="example-radios-inline1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="example-radios-inline2" name="new_build" value="no">
                <label class="form-check-label" for="example-radios-inline2">No</label>
            </div>
        </div>
    </div>
    <div class="form-group form-row">
        <span>Is this an auction property?</span>
        <div class="form-group" style="margin-left: 70px;">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="example-radios-inline3" name="auction_property" value="yes" checked="">
                <label class="form-check-label" for="example-radios-inline3">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="example-radios-inline4" name="auction_property" value="no">
                <label class="form-check-label" for="example-radios-inline4">No</label>
            </div>
        </div>
    </div>
    <div class="form-group form-row">
        <span>Is this a company transaction?</span>
        <div class="form-group" style="margin-left: 70px;">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="example-radios-inline5" name="company_transaction" value="yes" checked="">
                <label class="form-check-label" for="example-radios-inline5">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="example-radios-inline6" name="company_transaction" value="no">
                <label class="form-check-label" for="example-radios-inline6">No</label>
            </div>
        </div>
    </div>
    <div class="form-group form-row">
        <label>Lender</label>
        <select type="text" class="input-group" id="lender" name="lender" required="">
            <option value="0">Unknown</option>
            <?php $lenders = DB::table("lenders")->get();?>
            @foreach ($lenders as $lender)
            <option value="{{$lender->id}}">{{$lender->name}}</option>
            @endforeach
        </select>
    </div>
    <div style="text-align: right;">
        <button type="button" id="find" class="primary-btn text-uppercase" style="border: none; margin-top: 20px;">Find Solicitor</button>
    </div>

    <div class="solicitors" style="margin-top: 20px;">

    </div>
</div>
<form action="{{url('allocateSolicitor')}}" method="post" id="allocateform">
    @csrf
    <input name="id" id="solicitor_id" hidden />
</form>
@endsection

@section('js')
<script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
<script>    
    $("#estate_agent").select2();
    $("#lender").select2();

    $("#find").click(function(){
        $.ajax({
            url:"{{url('/findsolicitorpost')}}",
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {estate_agent:$("#estate_agent").val(), lender:$("#lender").val(), new_build:$("input[name=new_build]:checked").val(), auction_property:$("input[name=auction_property]:checked").val(), company_transaction:$("input[name=company_transaction]:checked").val()},
            success:function(req) {
                var solicitors = JSON.parse(req);
                var appendstr = "";

                if (solicitors.length == 0)
                {
                    appendstr = "<p class='empty'>There is no available solicitor.</p>";
                }
                else
                {
                    appendstr = "<p class='exist'>The solicitor you should select for this case is</p>";
                    appendstr += "<div class='solicitor-card'>";
                    solicitors.forEach(function(solicitor){
                        appendstr += "  <div class='row solicitor'>";
                        appendstr += "      <div class='col-4'>";
                        appendstr += "          <p>"+ solicitor.name +"</p>";
                        appendstr += "      </div>";
                        appendstr += "      <div class='col-8'>";
                        
                        if (solicitor.capacity == 0)
                            appendstr += "This solicitor have no capacity";
                        else
                            appendstr += "<button class='blog_btn' data-id='"+ solicitor.id +"'>Allocate</button>";

                        appendstr += "      </div>";
                        appendstr += "  </div>";
                    });
                    appendstr += "</div>";
                }

                $(".solicitors").html(appendstr);
            },
            error: function(ts) {
                console.log(ts);
            }
        });
    });
    $(document).on("click", ".blog_btn", function(){
        var id = $(this).data("id");
        $("#solicitor_id").val(id);
        $("#allocateform").submit();
    });
</script>
@endsection