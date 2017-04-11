@extends('admin.layouts.default')

@section('head_css')
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/datatables.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"/>
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">首页</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">内容管理</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-9">
            <h3 class="page-title">
                栏目管理 &nbsp;<small>设定文章的栏目，目前仅支持两级</small>
            </h3>
        </div>
        <div class="col-md-3" style="text-align: right">
            <div class="actions"  style="margin:20px 0">
                <div class="btn-group">
                    <a class="btn btn-default btn-sm"  onclick="GridClickFunction_Add()" href="javascript:;" >
                        <i class="fa fa-plus"></i> 新增栏目
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row" >
        <div class="col-md-12" >
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-scrollable" >
                        <table style="min-width:360px" class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr role="row">
                                <th width="3%" style="text-align: center">#</th>
                                <th width="42%">栏目名称</th>
                                <th width="20%">别名</th>
                                <th width="20%">栏目描述</th>
                                <th width="15%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $catalogs as $catalog )
                            <tr>
                                <td style="vertical-align:middle; text-align: center;">
                                    @if ( $catalog->is_leaf == 0 )
                                    <a href="javascript:void(0)" data-id='{{ $catalog->id}}' class="" onclick="CateToggle(this)"><i class="fa fa-plus"></i></a>
                                    @endif
                                </td>
                                <td style="padding-left:20px;">
                                    {{ $catalog->name}}
                                </td>
                                <td>
                                    {{ $catalog->code}}
                                </td>
                                <td>
                                    {{ $catalog->description}}
                                </td>
                                <td>
                                    <a href="javascript:;" onclick="GridClickFunction_Edit({{ $catalog->id}})" >编辑</a>&nbsp;&nbsp;
                                    <a href="javascript:;" onclick="GridClickFunction_Delete({{ $catalog->id}})" >删除</a>
                                </td>
                            </tr>
                            @foreach ( $catalog->sub as $sub )
                            <tr style="display:none" class="sub_cat_{{ $catalog->id}}">
                                <td>
                                </td>
                                <td style="padding-left:50px;">
                                    {{ $sub->name}}
                                </td>
                                <td>
                                    {{ $sub->code}}
                                </td>
                                <td>
                                    {{ $sub->description}}
                                </td>
                                <td>
                                    <a href="javascript:;" onclick="GridClickFunction_Edit({{ $sub->id}})">编辑</a>&nbsp;&nbsp;
                                    <a href="javascript:;" onclick="GridClickFunction_Delete({{ $sub->id}})">删除</a>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>
@endsection

@section('foot_script')
    <script type="text/javascript" src="/assets/global/plugins/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
    <script type="text/javascript" src="/assets/global/scripts/datatable.js" ></script>

    <script type="text/javascript" src="/assets/pages/scripts/cms/catalog.js"></script>
@endsection
