
var table;

function RenderOptionCol(val,type,item)
{
    var opts = '';
    opts += '<a href="javascript:void(0)" class="btn-edit">编辑角色</a><br/>';
    // opts += '<a href="javascript:void(0)" class="btn-auth">API权限设定</a><br/>';
    opts += '<a href="javascript:void(0)" class="btn-menu">菜单设定</a><br/>';
    opts += '<a href="javascript:void(0)" class="btn-delete">删除角色</a> ';
    return opts;
}

$(document).ready(function(){
    var cols = [
        {data:'s_role_id',name:'s_role_id',orderable:false,createdCell:function(cell, cellData, rowData, rowIndex, colIndex){
            $(cell).html(rowIndex+1)} },
        {data:'s_role_id',name:'s_role_id',orderable:true,searchable:true,visible:false,render:function(val){
            return val} },
        {data:'s_role_name',name:'s_role_name',orderable:true,searchable:true,visible:true,render:function(val){
            return val} },
        {data:'s_role_desc',name:'s_role_desc',orderable:true,searchable:true,render:function(val){
            return val}},
        {data:'','name':'',orderable:false,searchable:false,width:'120px',render:RenderOptionCol },
    ];

    var grid = new Datatable();
    grid.init({
        src: $("#data_tables"),
        dataTable: {
            "columns":cols,
            "ajax": {
                "url": "/admin/role/query",
            },
            "order": [
                [1, "desc"]
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
        }else if($(e.target).is('.btn-auth')){
            e.stopPropagation();
            GridClickFunction_Auth(rowData);
        }else if($(e.target).is('.btn-menu')){
            e.stopPropagation();
            GridClickFunction_Menu(rowData);
        }else if($(e.target).is('.btn-delete')){
            e.stopPropagation();
            GridClickFunction_Delete(rowData);
        }
    });
});

function GridClickFunction_Add(){
    var url = '/admin/role/add';
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

function GridClickFunction_Edit(item){
    var s_role_id = item.s_role_id;
    var url = "/admin/role/edit/"+s_role_id;
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

function GridClickFunction_Delete(item){
    var s_role_id = item.s_role_id;
    WX.Confirm('确定要删除么？',function(){
        var url = "/admin/role/delete/"+s_role_id;
        AjaxAction({'url':url,'method':"GET", 'success':function(data){
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

function GridClickFunction_Auth(item){

}

function GridClickFunction_Menu(item){
    var s_role_id = item.s_role_id;
    var url = '/admin/role/selectMenus/'+s_role_id ;
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