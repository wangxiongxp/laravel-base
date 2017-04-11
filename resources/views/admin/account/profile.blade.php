{% extends "../layouts/default.twig" %}

{% block head_css %}
    <link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
{% endblock %}

{% block content %}
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/admin">首页</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">帐号信息</a>
            </li>
        </ul>
    </div>

    <div class="row margin-top-20">
        <div class="col-md-12">
            <div class="profile-sidebar">
                <div class="portlet light profile-sidebar-portlet">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="http://123.56.17.16:8000/spika/v1/avatar/user/1{{ userInfo.accountId }}" class="img-responsive" alt="">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{ userInfo.accountName }}
                        </div>
                    </div>

                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                    <i class="icon-user"></i>
                                    个人信息 </a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab">
                                    <i class="icon-picture"></i>
                                    更换头像 </a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab">
                                    <i class="icon-key"></i>
                                    修改密码 </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">账户信息</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form role="form" action="/admin/profile" method="post" id="profileForm">
                                            <div class="form-group">
                                                <label class="control-label">手机号码</label>
                                                <p class="form-control-static">
                                                    {{ account.accountTel }}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">真实姓名</label>
                                                <input type="text" placeholder="请输入您的真实姓名" class="form-control" name="accountRealName" value="{{ account.accountRealName }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">电子邮箱</label>
                                                <input type="text" placeholder="请输入您常用的电子邮箱地址" class="form-control" name="accountEmail" value="{{ account.accountEmail }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">所在公司</label>
                                                <input type="text" placeholder="您当前所在的公司" class="form-control" name="accountCompany" value="{{ account.accountCompany }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">个人简介</label>
                                                <textarea class="form-control" rows="3" placeholder="做个有身份的人, 简单介绍一下您自己" name="accountIntro">{{ account.accountIntro }}</textarea>
                                            </div>
                                            <div class="margiv-top-10">
                                                <a href="javascript:;" class="btn green-haze" onclick="$('#profileForm').submit()">
                                                    确认修改 </a>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="tab_1_2">
                                        <p>
                                            为保证显示效果, 请上传宽高比1:1的图片
                                        </p>
                                        <form id="updateUserPhotoForm" action="/admin/profile/updateUserPhoto" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 160px; height: 160px;">
                                                        <img src="{{ userInfo.accountImage }}" alt="" style="width: 160px;" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    </div>
                                                    <div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																选择图片 </span>
																<span class="fileinput-exists">
																重新选择 </span>
																<input type="file" name="userPhoto">
																</span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                            移除 </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">注意! </span>
                                                    <span>图片缩略图仅支持最新版本的Firefox, Chrome, Opera, Safari和Internet Explorer 10</span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green-haze" onclick="$('#updateUserPhotoForm').submit()">
                                                    确认修改 </a>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="tab_1_3">
                                        <form action="/admin/accounts/modifyPassword" method="POST" id="modify_password_form">
                                            <div class="form-group">
                                                <label class="control-label">当前密码</label>
                                                <input type="password" name="old_password" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">新密码</label>
                                                <input type="password" name="password" class="form-control" id="register_password" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">确认新密码</label>
                                                <input type="password" name="confirm_password" class="form-control"/>
                                            </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green-haze" onclick="$('#modify_password_form').submit()">
                                                    更改密码 </a>
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

{% endblock %}

{% block foot_script %}
    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/profile.js" type="text/javascript"></script>
{% endblock %}