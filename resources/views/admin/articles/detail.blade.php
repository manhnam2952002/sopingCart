@extends('admin.layout')

@section('page_css')
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
@endsection

@section('content')
    <header class="page-header">
        <h2>Article Detail</h2>
    </header>
    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">{{$obj->title}}</h2>
                </header>
                <div class="panel-body">
                    <div>
                        <img src="{{$obj->thumbnail}}" style="width: 300px" alt="">
                    </div>
                    {!! $obj->content !!}
                </div>
            </section>
        </div>
    </div>
@endsection

@section('page_js')
    <script src="{{URL::asset('assets/vendor/select2/select2.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>

    <script src="{{URL::asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
    <script src="{{URL::asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
    <script src="{{URL::asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
@endsection

