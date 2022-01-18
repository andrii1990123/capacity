@extends('admin.layout.default')
@section('css')
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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Add Solicitor</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Manage Solicitor</li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Elements -->
    <form action="{{url('admin/Solicitor/Add')}}" method="post">
        @csrf
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Solicitor Info</h3>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-row">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-row">
                        <label>Branch Name</label>
                        <input type="text" class="form-control" id="branch_name" name="branch_name" required="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-row">
                        <label>Address line 1</label>
                        <input type="text" class="form-control" id="address1" name="address1" required="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-row">
                        <label>Address line 2</label>
                        <input type="text" class="form-control" id="address2" name="address2">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-row">
                        <label>Address line 3</label>
                        <input type="text" class="form-control" id="address3" name="address3">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-row">
                        <label>County</label>
                        <input type="text" class="form-control" id="county" name="county" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-row">
                        <label>Postcode</label>
                        <input type="text" class="form-control" id="postcode" name="postcode" required="">
                    </div>
                </div>
            </div>
            <div class="form-group form-row">
                <label>Note</label>
                <textarea type="text" class="form-control" id="branch_manager" name="branch_manager"></textarea> 
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-row">
                        <div class="custom-control custom-checkbox custom-control-primary mb-1">
                            <input type="checkbox" class="custom-control-input" id="new_build" name="new_build" checked="">
                            <label class="custom-control-label" for="new_build">New Build</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-row">
                        <div class="custom-control custom-checkbox custom-control-primary mb-1">
                            <input type="checkbox" class="custom-control-input" id="auction_property" name="auction_property" checked="">
                            <label class="custom-control-label" for="auction_property">Auction Property</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-row">
                        <div class="custom-control custom-checkbox custom-control-primary mb-1">
                            <input type="checkbox" class="custom-control-input" id="company_transaction" name="company_transaction" checked="">
                            <label class="custom-control-label" for="company_transaction">Company Transaction</label>
                        </div>
                    </div>
                </div>
            </div>
            

            <h2 class="content-heading"></h2>
            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-12" style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-secondary" href="{{url('/admin/SolicitorListView')}}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- END Elements -->
</div>
@endsection

@section('js')
<script>    
</script>
@endsection
