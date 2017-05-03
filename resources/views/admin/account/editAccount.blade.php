@extends('admin.layouts.default')

@section('head_css')
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
                    <a href="#">成员管理</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-9">
                <h3 class="page-title">
                    成员信息修改 &nbsp;<small>维护组织内成员信息，手机号将作为云助理登录帐号使用。</small>
                </h3>
            </div>
            <div class="col-md-3" style="text-align: right">
                <div class="actions"  style="margin:20px 0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" >
                <div class="portlet light bordered">
                    <!-- Begin: life time stats -->
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="EditForm" method="post" role="form" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">姓名<span class="required" >*</span></label>
                                            <div class="col-md-10">
                                                <input type="hidden" name="account_id" id="account_id" value="{{$account->account_id}}"/>
                                                <input type="text" id="account_real_name" name="account_real_name" value="{{$account->account_real_name}}" placeholder="输入成员姓名" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">性别<span class="required" >*</span></label>
                                            <div class="col-md-10" >
                                                <div class="radio-list ">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="account_sex" value="1" checked="checked" />男
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="account_sex"  value="2" />女
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">手机号码<span class="required" >*</span></label>
                                            <div class="col-md-10">
                                                <input type="text" id="account_tel" name="account_tel" value="{{$account->account_tel}}" placeholder="输入11位有效手机号码" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">状态<span class="required" >*</span></label>
                                            <div class="col-md-10">
                                                <select class="form-control" id="account_status" name="account_status">
                                                    <option value="">==请选择==</option>
                                                    <option value="1">活动</option>
                                                    <option value="0">锁定</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label"></label>
                                            <button type="button" class="btn blue" onclick="Function_SaveForm();">保存</button>
                                            <button type="button" onclick="location.href='/admin/account'" class="btn" class="btn btn-default">返回</button>
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
@endsection

@section('foot_script')
    <script type="text/javascript">

        $(document).ready(function(){

            $("#account_status").val({{ $account->account_status}});

            SetRadioSelected('account_sex','{{ $account->account_sex}}');
            App.initUniform();

            jQuery.validator.addMethod("checkPhone", function(value, element) {
                return this.optional(element) || ( /^1[34578]\d{9}$/.test(value));
            }, "请输入正确的手机号码");

            var setting = {
                rules: {
                    account_real_name: {
                        required: true
                    },
                    account_sex: {
                        required: true
                    },
                    account_tel: {
                        required: true,
                        checkPhone:true,
                    }
                },
            }

            WX.Validate('EditForm',setting);

            var options = {
                dataType:  'json',
                //beforeSubmit: ShowRequest ,
                success: ShowResponse ,
            };
            $('#EditForm').ajaxForm(options);
        });

        function ShowResponse(responseText, statusText) {
            data = responseText;
            if(data){
                if(data.code == 1)
                {
                    WX.toastr({'type':'success','message':'修改成功.','onHidden':function(){
                        location.href = "/admin/account";
                    }});
                }else{
                    WX.toastr({'type':'error','message':'修改失败!'});
                }
            }
        }

        function Function_SaveForm(){
            $("#EditForm").attr('action','/admin/account/update');
            $("#EditForm").submit();
        }
    </script>
@endsection
