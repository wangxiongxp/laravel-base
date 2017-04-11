
$('#tree_group').jstree({
    "core" : {
        "themes" : {
            "responsive": false
        },
        'data': {
            'url' : function (node) {
                return '/admin/role/getRoleTree';
            },
            'data' : function (node) {
                return { };
            },
        }
    },
    "types" : {
        "default" : {
            "icon" : "fa fa-folder icon-state-warning icon-lg"
        },
        "file" : {
            "icon" : "fa fa-file icon-state-warning icon-lg"
        }
    },
    "plugins": ["types"]
});

var table;
var roleId;

function RenderOptionCol(val,type,item)
{
    var opts = '';
    opts += '<a href="javascript:void(0)" class="btn-delete">删除</a> ';
    return opts;
}

$(document).ready(function(){
    var cols = [
        {data:'s_role_id',name:'s_role_id',orderable:false,createdCell:function(cell, cellData, rowData, rowIndex, colIndex){
            $(cell).html(rowIndex+1)} },
        {data:'account_real_name',name:'account_real_name',orderable:true,searchable:true,visible:true,render:function(val){
            return val} },
        {data:'s_role_name',name:'s_role_name',orderable:true,searchable:true,render:function(val){
            return val}},
        {data:'','name':'',orderable:false,searchable:false,width:'120px',render:RenderOptionCol },
    ];

    var grid = new Datatable();
    grid.init({
        src: $("#data_tables"),
        dataTable: {
            "columns":cols,
            "ajax": {
                "url": "/admin/roleMember/query",
            },
            "order": [
                [2, "desc"]
            ]
        }

    });

    table = grid.getDataTable();
    table.on('click','td',function(e){
        var rowIndex = table.cell(this).index().row;
        var rowData  = table.row(rowIndex).data();
        if($(e.target).is('.btn-delete')){
            e.stopPropagation();
            GridClickFunction_Delete(rowData);
        }
    });

    $('#tree_group').on('select_node.jstree', function(e,data) {
        var s_role_id   = data.node.id ;
        roleId = s_role_id ;
        grid.setAjaxParam('s_role_id',s_role_id);
        $(".keyword").val("");
        table.ajax.reload();
    });

});

function GridClickFunction_Add(){

    if(undefined == roleId || null == roleId || roleId == ''){
        WX.toastr({'type':'info','message':'请选择角色.'});
        return ;
    }

    var url = '/admin/roleMember/add';
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
    var account_id = item.account_id;
    WX.Confirm('确定要删除么？',function(){
        var url = "/admin/roleMember/delete/"+s_role_id+"/"+account_id;
        AjaxAction({'url':url, 'method' : 'GET', 'success':function(data){
            if(data.code == 1) {
                WX.toastr({'type':'success','message':"删除成功.",'onHidden':function(){
                    table.ajax.reload();
                }});
            } else {
                WX.toastr({'type':'error','message':'删除失败.'});
            }
        }});
    });
}

