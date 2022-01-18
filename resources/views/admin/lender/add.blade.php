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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Add Lender</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Manage Lender</li>
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
    <form action="{{url('admin/Lender/Add')}}" method="post">
        @csrf
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Lender Info</h3>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-row">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" required="">
                    </div>
                </div>
            </div>

            <h2 class="content-heading"></h2>
            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-12" style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-secondary" href="{{url('/admin/LenderListView')}}">Cancel</a>
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
