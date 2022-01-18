@extends('admin.layout.default')
@section('css')
<style type="text/css">
    .block-content>div{
        padding-top: 10px;
    }
    .block-content{
        padding-bottom: 30px;
    }
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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Setting Edit</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Setting</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Elements -->
    <form action="{{url('admin/EditSystemPasswordSetPost')}}" method="post">
        @csrf
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">System Password</h3>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-md-4">
                    Password (Frontend)
                </div>
                <div class="col-md-8">
                    <?php
                        $system = DB::table("systems")->first();
                    ?>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Write password." value="{{ $system->password }}" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- END Elements -->
</div>
<!-- END Page Content -->
@endsection

@section('js')
@endsection
