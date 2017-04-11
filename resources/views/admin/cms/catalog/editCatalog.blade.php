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
                    编辑栏目 &nbsp;<small>设定文章的栏目，目前仅支持两级</small>
                </h3>
            </div>
            <div class="col-md-3" style="text-align: right">
                <div class="actions"  style="margin:20px 0">
                </div>
            </div>
        </div>

        <div class="row" >
            <div class="col-md-12" >
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="AddForm" method="post" role="form" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">父级栏目<span class="required" >*</span></label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="parent_id" disabled="disabled" name="parent_id">
                                                    <option value='0'>一级栏目</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">栏目名称<span class="required" >*</span></label>
                                            <div class="col-md-6">
                                                <input type="hidden" id="id" name="id" value="{{ $catalog->id}}" >
                                                <input type="text" id="name" name="name" value="{{ $catalog->name}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">别名<span class="required" >*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="code" name="code" value="{{ $catalog->code}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">描述<span class="required" >*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="description" name="description" value="{{ $catalog->description}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">排序<span class="required" >*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="sort" name="sort" value="{{ $catalog->sort}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label"></label>
                                            <div class="col-md-6">
                                                <a class="btn btn-primary" onclick="Function_SaveForm()">保存</a>
                                                <a class="btn btn-primary" onclick="Function_Back()">返回</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
@endsection

@section('foot_script')
    <script type="text/javascript">

        $(document).ready(function(){
            ajaxSelectSimple('/admin/cms/catalog/getCatalogByParent/0','parent_id','id','name','{{ $catalog->parent_id}}');
            var setting = {
                rules: {
                    name: {
                        required: true,
                    },
                    code: {
                        required: true,
                    },
                    sort: {
                        required: true,
                    },
                },
            }
            WX.Validate('AddForm',setting);

            var options = {
                dataType:  'json',
                //beforeSubmit: ShowRequest ,
                success: ShowResponse ,
            };
            $('#AddForm').ajaxForm(options);
        });

        function ShowResponse(responseText, statusText) {
            data = responseText;
            if(data){
                if(data.code == 1)
                {
                    WX.toastr({'type':'success','message':'修改成功.','onHidden':function(){
                        location.href = "/admin/cms/catalog";
                    }});
                }else{
                    WX.toastr({'type':'error','message':'修改失败!'});
                }
            }
        }

        function Function_SaveForm(){
            $("#AddForm").attr('action','/admin/cms/catalog/update');
            $("#AddForm").submit();
        }

        function Function_Back(){
            location.href = "/admin/cms/catalog";
        }

    </script>

@endsection
