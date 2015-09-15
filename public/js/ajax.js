$(document).ready(function(){
  //ajax导入人员列表数据
    $.ajax({
      url:"/admin/personnel/list",
      type:"GET",
      dataType: "json",
      success: function (data) {
            $.each(data.data,function(index,content){
            var tr='<tr><td><input type="checkbox" class="selectable"></td><td>'+content.id+'</td><td>'+content.name+'</td><td class="am-hide-sm-only">'+content.email+'</td><td class="am-hide-sm-only">'+content.mobile+'</td><td>'+content.birthDate+'</td><td><div class="am-btn-toolbar"><div class="am-btn-group am-btn-group-xs"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>编辑</button><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delebutton"><span class="am-icon-trash-o"></span>删除</button></div></div></td></tr>';
            $("#talentlist").append(tr);
            })
      }
    })
  //ajax实现分页的效果

})




