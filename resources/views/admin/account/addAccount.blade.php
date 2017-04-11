<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">
        新增成员
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <form id="AddForm" method="post" role="form" class="form-horizontal">
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">姓名<span class="required" >*</span></label>
                        <div class="col-md-8">
                            <input type="text" id="account_real_name" name="account_real_name" value="" placeholder="输入姓名" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">密码<span class="required" >*</span></label>
                        <div class="col-md-8">
                            <input type="password" id="password" name="password" value="" placeholder="输入密码" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">性别<span class="required" >*</span></label>
                        <div  class="col-md-8" >
                            <div class="radio-list ">
                                <label class="radio-inline">
                                    <input type="radio" name="account_sex" id="account_sex_1" value="1" checked="checked" />男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="account_sex" id="account_sex_2" value="2" />女
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">手机号码<span class="required" >*</span></label>
                        <div class="col-md-8">
                            <input type="text" id="account_tel" name="account_tel" value="" placeholder="输入11位有效手机号码" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">状态<span class="required" >*</span></label>
                        <div class="col-md-8">
                            <select class="form-control" id="account_status" name="account_status">
                                <option value="1" selected="selected">活动</option>
                                <option value="0">锁定</option>
                            </select>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn blue" onclick="Function_SaveForm();">保存</button>
    <button type="button" data-dismiss="modal" class="btn btn-default">关闭</button>
</div>


<script type="text/javascript">

    $(function(){

        App.initUniform();

        jQuery.validator.addMethod("checkPhone", function(value, element) {
            return this.optional(element) || ( /^1[34578]\d{9}$/.test(value));
        }, "请输入正确的手机号码");

        var setting = {
            rules: {
                account_real_name: {
                    required: true
                },
                password: {
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

        WX.Validate('AddForm',setting);

        var options = {
            dataType:  'json',
            beforeSubmit:  function() {
                App.blockUI({ animate: true});
                return true;
            },
            success: function(responseText){
                App.unblockUI();
                if(responseText){
                    if(responseText.code == 1) {
                        WX.toastr({'type':'success','message':'新增成功！', 'onHidden':function(){
                            location.href = "/admin/account";
                        }});
                    }else{
                        WX.toastr({'type':'error','message': '新增失败'});
                    }
                }
            }
        };
        $('#AddForm').ajaxForm(options);

    })

    function Function_SaveForm(){
        $("#AddForm").attr('action','/admin/account/save');
        $("#AddForm").submit();
    }

</script>
