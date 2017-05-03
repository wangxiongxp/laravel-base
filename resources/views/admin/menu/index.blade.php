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
                <a href="#">菜单管理</a>
            </li>
        </ul>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12" >
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> 菜单管理</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" >
                            <label onclick="GridClickFunction_Add()" class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                <i class="fa fa-plus"></i> 新增菜单</label>
                        </div>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-scrollable" >
                        <table style="min-width:360px" class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr role="row">
                                <th width="3%" style="text-align: center">#</th>
                                <th width="42%">菜单名称</th>
                                <th width="20%">菜单Url</th>
                                <th width="20%">菜单图标</th>
                                <th width="15%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $menus as $menu )
                            <tr>
                                <td style="vertical-align:middle; text-align: center;">
                                    @if ( $menu->menu_leaf == 0 )
                                    <a href="javascript:void(0)" data-id='{{ $menu->menu_id}}' class="" onclick="CateToggle(this)"><i class="fa fa-plus"></i></a>
                                    @endif
                                </td>
                                <td style="padding-left:20px;">
                                    {{ $menu->menu_text}}
                                </td>
                                <td>
                                    {{ $menu->menu_url}}
                                </td>
                                <td>
                                    {{ $menu->menu_css}}
                                </td>
                                <td>
                                    <a href="javascript:;" onclick="GridClickFunction_Edit({{ $menu->menu_id}})" >编辑</a>&nbsp;&nbsp;
                                    <a href="javascript:;" onclick="GridClickFunction_Delete({{ $menu->menu_id}})" >删除</a>
                                </td>
                            </tr>
                            @foreach ( $menu->sub as $sub )
                            <tr style="display:none" class="sub_cat_{{ $menu->menu_id}}">
                                <td>
                                </td>
                                <td style="padding-left:50px;">
                                    {{ $sub->menu_text}}
                                </td>
                                <td>
                                    {{ $sub->menu_url}}
                                </td>
                                <td>
                                    {{ $sub->menu_css}}
                                </td>
                                <td>
                                    <a href="javascript:;" onclick="GridClickFunction_Edit({{ $sub->menu_id}})">编辑</a>&nbsp;&nbsp;
                                    <a href="javascript:;" onclick="GridClickFunction_Delete({{ $sub->menu_id}})">删除</a>
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

    <script type="text/javascript" src="/assets/pages/scripts/menu.js"></script>
@endsection
