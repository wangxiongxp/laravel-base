
var table;
var groupId;
var groupName;

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
            }
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



$(document).ready(function(){
    $('#tree_group').on('select_node.jstree', function(e,data) {
        groupName = data.node.text ;
        groupId = data.node.id ;
        $("#curr_group_name").text(groupName);

        getGroupInfo(groupId);
    });
});

function getGroupInfo(s_group_id){
    var url = '/admin/group/get/'+s_group_id ;
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function(data){
            var item = data.data;
            if(item.s_group_parent==0){
                $("#s_group_parent").text("顶级部门");
            }else{
                $("#s_group_parent").text(item.s_group_parent_name);
            }
            $("#s_group_name").text(item.s_group_name);
            $("#s_group_type").text(item.s_group_type_name);
            $("#s_group_desc").text(item.s_group_desc);
        }
    });
}

function GridClickFunction_Add(){
    if(undefined == groupId || null == groupId || groupId == ''){
        WX.toastr({'type':'info','message':'请选择群组.'});
        return ;
    }
    var url = '/admin/group/add?s_group_id='+groupId + '&s_group_name=' + groupName ;
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

function GridClickFunction_Edit(){
    if(undefined == groupId || null == groupId || groupId == ''){
        WX.toastr({'type':'info','message':'请选择群组.'});
        return ;
    }
    var url = '/admin/group/edit/'+groupId ;
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

function GridClickFunction_Delete(){
    if(undefined == groupId || null == groupId || groupId == ''){
        WX.toastr({'type':'info','message':'请选择群组.'});
        return ;
    }

    WX.Confirm('确定要删除么？',function(){
        var url = "/admin/group/delete/"+groupId ;
        AjaxAction({'url':url,'method':'GET', 'success':function(data){
            if(data && data.code == 1) {
                WX.toastr({'type':'success','message':'删除成功.','onHidden':function(){
                    location.href = location.href;
                }});
            } else {
                WX.toastr({'type':'error','message':'删除失败.'});
            }
        }});
    });
}



