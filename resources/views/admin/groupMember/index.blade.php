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
                <a href="#">群组成员管理</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-9">
            <h3 class="page-title">
                群组成员管理 &nbsp;<small>设定系统中群组的成员信息，每个成员可以隶属于多个不同的群组</small>
            </h3>
        </div>
        <div class="col-md-3" style="text-align: right">
            <div class="actions"  style="margin:20px 0">
                <div class="btn-group">
                    <a class="btn btn-default btn-sm"  onclick="GridClickFunction_Add()" href="javascript:;" >
                        <i class="fa fa-plus"></i> 添加成员
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
                            <div class="portlet light" style="padding-left:5px;min-height: 380px;">
                                <div class="portlet-body">
                                    <div id="tree_group" class="tree-demo"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9" >
                            <!-- Begin: life time stats -->
                            <div class="portlet-body table-container">
                                <div class="table-group-search-wrapper" style="display:none">
                                    <div class="input-group input-medium pull-right">
                                        <input type="text" id="keyword" name="keyword" placeholder="关键字" class="keyword form-control" />
                                        <span class="input-group-btn">
                                            <button class="btn green searchbutton">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <table id="data_tables" class="table table-striped table-bordered table-hover table-checkable order-column" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>成员</th>
                                        <th>群组名称</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                </table>
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

    <script type="text/javascript" src="/assets/pages/scripts/groupMember.js"></script>
@endsection

