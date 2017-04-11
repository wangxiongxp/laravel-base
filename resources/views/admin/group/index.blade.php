@extends('admin.layouts.default')

@section('head_css')
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/datatables.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/jstree/dist/themes/default/style.min.css"/>
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
                <a href="#">组织管理</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-9">
            <h3 class="page-title">
                组织管理 &nbsp;<small>维护组织内成员信息，手机号将作为云助理登录帐号使用。</small>
            </h3>
        </div>
        <div class="col-md-3" style="text-align: right">
            <div class="actions"  style="margin:20px 0">
                <div class="btn-group">
                    <a class="btn btn-default btn-sm"  onclick="GridClickFunction_Add()" href="javascript:;" >
                        <i class="fa fa-plus"></i> 新增组织
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="portlet light" style="padding-left:5px">
                                <div class="portlet-body">
                                    <div id="tree_group" class="tree-demo"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9" >
                            <!-- Begin: life time stats -->
                            <div class="row" >
                                <div class="col-md-12">

                                    <div class="portlet light">
                                        <div class="portlet-title tabbable-line">
                                            <div class="caption">
                                                <i class="icon-pin font-yellow-crusta"></i>
                                                <span class="caption-subject "> 当前组织： </span>
                                                <span class="caption-helper" id="curr_group_name"> 未选择...</span>
                                            </div>
                                            <div class="tools">
                                                <a href="javaScript:void(0)" onclick="GridClickFunction_Edit()"> 编辑 </a>
                                                <a href="javaScript:void(0)" onclick="GridClickFunction_Delete()"> 删除 </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <form id="AddForm" method="post" role="form" class="form-horizontal">
                                                <div class="form-body">

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">所属部门： </label>
                                                        <div class="col-md-10">
                                                            <p class="form-control-static" id="s_group_parent">

                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">组织名称： </label>
                                                        <div class="col-md-10">
                                                            <p class="form-control-static" id="s_group_name">

                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">组织类型： </label>
                                                        <div class="col-md-10">
                                                            <p class="form-control-static" id="s_group_type">

                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">组织备注： </label>
                                                        <div class="col-md-10">
                                                            <p class="form-control-static" id="s_group_desc">

                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot_script')
    <script type="text/javascript" src="/assets/global/plugins/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
    <script type="text/javascript" src="/assets/global/scripts/datatable.js" ></script>
    <script type="text/javascript" src="/assets/global/plugins/jstree/dist/jstree.min.js"></script>

    <script type="text/javascript" src="/assets/pages/scripts/group.js"></script>
@endsection

