
function GridClickFunction_Add(){
    var url = '/admin/menu/add';
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

function GridClickFunction_Edit (menuId){
    var url = '/admin/menu/edit/'+menuId ;
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

function GridClickFunction_Delete(menuId){
    WX.Confirm('确定要删除么？',function(){
        var url = '/admin/menu/delete/'+menuId;
        AjaxAction({'url':url,'method':'GET', 'success':function(data){
            if(data.code == 1) {
                WX.toastr({'type':'success','message':'删除成功!','onHidden':function(){
                    location.href = location.href;
                }});
            } else {
                WX.toastr({'type':'error','message':'删除失败!'});
            }
        }});
    });
}

function CateToggle(obj){
    var id = $(obj).data('id');
    var open = $(obj).hasClass('open');
    if(open){
        $(".sub_cat_"+id).hide();
        $(obj).removeClass('open');
        $(obj).find('i').removeClass('fa-minus').addClass('fa-plus');
    }else{
        $(".sub_cat_"+id).show();
        $(obj).addClass('open');
        $(obj).find('i').removeClass('fa-plus').addClass('fa-minus');
    }
}