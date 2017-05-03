
var table;

function RenderOptionCol(val,type,item)
{
    var opts = '';
    opts += '<a href="javascript:void(0)" class="btn-edit">修改信息</a><br/>';
    opts += '<a href="javascript:void(0)" class="btn-resetPwd">重置密码</a><br/>';
    opts += '<a href="javascript:void(0)" class="btn-delete">删除账号</a> ';
    return opts;
}

$(document).ready(function(){

    var cols = [
        // {data:'accountId',name:'sys_account_id',orderable:false,createdCell:function(cell, cellData, rowData, rowIndex, colIndex){
        //     $(cell).html("<input type='checkbox' name='checkList' value='" + cellData + "'/>")} },
        {data:'account_id',name:'account_id',orderable:false,createdCell:function(cell, cellData, rowData, rowIndex, colIndex){
                $(cell).html(rowIndex+1)} },
        {data:'account_real_name',name:'account_real_name',orderable:true,searchable:true,visible:true,render:function(val){
            return val} },
        {data:'account_email',name:'account_email',orderable:true,searchable:true,render:function(val){
            return val}},
        {data:'account_tel',name:'account_tel',orderable:true,searchable:true,render:function(val){
            return val}},
        {data:'account_status',name:'account_status',orderable:false,searchable:true,render:function(val){
            if(val==1){
                return '<span class="badge badge-success">正常</span>'
            }else{
                return '<span class="badge badge-warning">锁定</span>';
            }
        }},
        {data:'','name':'',orderable:false,searchable:false,width:'120px',render:RenderOptionCol },
    ];

    var grid = new Datatable();
    grid.init({
        src: $("#data_tables"),
        dataTable: {
            "columns":cols,
            "ajax": {
                "url": "/admin/account/query",
            },
            "order": [
                [4, "desc"]
            ]
        }
    });

    table = grid.getDataTable();
    table.on('click','td',function(e){
        var rowIndex = table.cell(this).index().row;
        var rowData  = table.row(rowIndex).data();
        if($(e.target).is('.btn-edit')){
            e.stopPropagation();
            GridClickFunction_Edit(rowData);
        }else if($(e.target).is('.btn-resetPwd')){
            e.stopPropagation();
            GridClickFunction_ResetPwd(rowData);
        }else if($(e.target).is('.btn-delete')){
            e.stopPropagation();
            GridClickFunction_Delete(rowData);
        }
    });
});

function GridClickFunction_Add(){
    var url = '/admin/account?act=add';
    location.href = url ;

    // $.ajax({
    //     type: "GET",
    //     url: url,
    //     dataType: 'html',
    //     success: function(data){
    //         $('#popupModel .modal-content').html(data);
    //         App.initSlimScroll('.scroller');
    //     }
    // });
    // $('#popupModel').modal('show');
}

function GridClickFunction_Edit(item){
    var url = "/admin/account?act=edit&id="+item.account_id;
    location.href = url ;

    // $.ajax({
    //     type: "GET",
    //     url: url,
    //     dataType: 'html',
    //     success: function(data){
    //         $('#popupModel .modal-content').html(data);
    //         App.initSlimScroll('.scroller');
    //     }
    // });
    // $('#popupModel').modal('show');
}

function GridClickFunction_Delete(item){
    var account_id = item.account_id;
    WX.Confirm('确定要删除该帐号么？',function(){
        var url = "/admin/account/delete/"+account_id;
        AjaxAction({'url':url, 'method':'GET','success':function(data){
            if(data.code == 1) {
                WX.toastr({'type':'success','message':'删除成功.','onHidden':function(){
                    table.ajax.reload();
                }});
            } else {
                WX.toastr({'type':'error','message':'删除失败.'});
            }
        }});
    });
}

function GridClickFunction_ResetPwd(item){
    var account_id = item.account_id;
    var url = '/admin/account/showResetPassword/'+account_id ;

    $.ajax({
        type: "GET",
        url: url,
        dataType: 'html',
        success: function(data){
            $('#popupModel .modal-content').html(data);
            App.initSlimScroll('.scroller');
        }
    });
    $('#popupModel').modal('show');
}

function GridClickFunction_Export(){
    var url = "/admin/account/export";
    location.target = "_blank" ;
    location.href = url ;
}
