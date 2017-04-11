
$('#tree_group').jstree({
    "core" : {
        "themes" : {
            "responsive": false
        },
        'data': {
            'url' : function (node) {
                return '/admin/group/getGroupTree';
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
var groupId;

function RenderOptionCol(val,type,item)
{
    var opts = '';
    opts += '<a href="javascript:void(0)" class="btn-delete">删除</a> ';
    opts += '<a href="javascript:void(0)" class="btn-oauth">群组授权</a> ';
    return opts;
}

$(document).ready(function(){
    var cols = [
        {data:'s_group_id',name:'s_group_id',orderable:false,createdCell:function(cell, cellData, rowData, rowIndex, colIndex){
            $(cell).html(rowIndex+1)} },
        {data:'account_real_name',name:'account_real_name',orderable:true,searchable:true,visible:true,render:function(val){
            return val} },
        {data:'s_group_name',name:'s_group_name',orderable:true,searchable:true,visible:true,render:function(val){
            return val} },
        {data:'','name':'',orderable:false,searchable:false,width:'120px',render:RenderOptionCol },
    ];

    var grid = new Datatable();
    grid.init({
        src: $("#data_tables"),
        dataTable: {
            "columns":cols,
            "ajax": {
                "url": "/admin/groupMember/query",
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
        }else if($(e.target).is('.btn-oauth')){
            e.stopPropagation();
            GridClickFunction_Group(rowData);
        }
    });

    $('#tree_group').on('select_node.jstree', function(e,data) {
        groupId = data.node.id ;
        grid.setAjaxParam('s_group_id',groupId);
        $(".keyword").val("");
        table.ajax.reload();
    });

});

function GridClickFunction_Add(){

    if(undefined == groupId || null == groupId || groupId == ''){
        WX.toastr({'type':'info','message':'请选择群组.'});
        return ;
    }

    var url = '/admin/groupMember/add';
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
    var s_group_id = item.s_group_id;
    var account_id = item.account_id;
    WX.Confirm('确定要删除么？',function(){
        var url = "/admin/groupMember/delete/"+s_group_id+"/"+account_id;
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

function GridClickFunction_Group(item){
    var account_id = item.account_id;
    var url = '/admin/groupMember/selectGroup/'+account_id ;
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'html',
        success: function(data){
            $('#popupModel .modal-content').html(data);
            App.initSlimScroll('.scroller');
            App.initUniform();
        }
    });
    $('#popupModel').modal('show');

}

function GridClickFunction_Position(item){

}
 

