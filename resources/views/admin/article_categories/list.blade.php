@extends('admin.layout')

@section('page_css')
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
@endsection

@section('content')
    <header class="page-header">
        <h2>Danh sách danh mục bài viết</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tables</span></li>
                <li><span>Advanced</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Danh sách hiện có</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr class="gradeU">
                        <td>{{$item->id}}</td>
                        <td><a href="/admin/article-categories/{{$item->id}}">{{$item->name}}</a></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/admin/article-categories/{{$item->id}}/edit">Sửa</a>
                            <form style="display: inline" action="/admin/article-categories/{{$item->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắc xoá danh muc này?')">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row datatables-footer">
                <div class="col-sm-12 col-md-6">
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_bs_normal" id="datatable-default_paginate">
{{--                        {!! $list->links() !!}--}}
                        @include('pagination.default', ['paginator' => $list])
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: page -->
@endsection

@section('page_js')
{{--    <script src="{{URL::asset('assets/vendor/select2/select2.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>--}}

{{--    <script src="{{URL::asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>--}}
@endsection

