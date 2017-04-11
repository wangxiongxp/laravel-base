
function GridClickFunction_Add(){
    var url = '/admin/cms/catalog/add';
    location.href = url ;
}

function GridClickFunction_Edit (menuId){
    var url = '/admin/cms/catalog/edit/'+menuId ;
    location.href = url ;
}

function GridClickFunction_Delete(menuId){
    WX.Confirm('确定要删除么？',function(){
        var url = '/admin/cms/catalog/delete/'+menuId;
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