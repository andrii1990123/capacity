@extends('admin.layout.default')
@section('css')
@endsection

@section('content')

@endsection

@section('js')
    <script src="{{ asset('plugins/datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dashboard-permisionlist').DataTable({
                pagingType: "simple",
                pageLength: 4,
                language: {
                    paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
                }
            });
        } );
    </script>
@endsection