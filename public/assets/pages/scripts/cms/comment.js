
var table;

function RenderOptionCol(val,type,item)
{
    var opts = '';
    opts += '<a href="javascript:void(0)" class="btn-view">查看</a>&nbsp;&nbsp;';
    opts += '<a href="javascript:void(0)" class="btn-edit">修改</a>&nbsp;&nbsp;';
    opts += '<a href="javascript:void(0)" class="btn-delete">删除</a> ';
    return opts;
}

$(document).ready(function(){
    var cols = [
        // {data:'accountId',name:'sys_account_id',orderable:false,createdCell:function(cell, cellData, rowData, rowIndex, colIndex){
        //     $(cell).html("<input type='checkbox' name='checkList' value='" + cellData + "'/>")} },
        {data:'id',name:'id',orderable:false,createdCell:function(cell, cellData, rowData, rowIndex, colIndex){
                $(cell).html(rowIndex+1)} },
        {data:'cms_article_title',name:'cms_article_title',orderable:false,searchable:true,visible:true,render:function(val){
            return val} },
        {data:'content',name:'content',orderable:false,searchable:true,visible:true,render:function(val){
            return val.substring(0,30)+'...'} },
        {data:'created_at',name:'created_at',orderable:true,searchable:true,render:function(val){
            return val}},
        {data:'status',name:'status',orderable:false,searchable:true,render:function(val){
            if(val==1){
                return '审核通过'
            }else if(val==2){
                return '审核拒绝';
            }else{
                return '待审核';
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
                "url": "/admin/cms/comment/query",
            },
            "order": [
                [0, "desc"]
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
        }else if($(e.target).is('.btn-delete')){
            e.stopPropagation();
            GridClickFunction_Delete(rowData);
        }else if($(e.target).is('.btn-view')){
            e.stopPropagation();
            GridClickFunction_View(rowData);
        }
    });
});

function GridClickFunction_Add(){
    var url = '/admin/cms/comment/add';
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

function GridClickFunction_View(item){
    var url = "/admin/cms/comment/view/"+item.id;
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
    var url = "/admin/cms/comment/edit/"+item.id;
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
    WX.Confirm('确定要删除么？',function(){
        var url = "/admin/cms/comment/delete/"+item.id;
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

