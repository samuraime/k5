$(document).ready(function(){
  //ajax导入人员列表数据
    $.ajax({
      url:"/admin/personnel/list",
      type:"GET",
      dataType: "json",
      success: function (data) {
            $.each(data.data,function(index,content){
            var tr='<tr><td><input type="checkbox" class="selectable"></td><td>'+content.id+'</td><td>'+content.name+'</td><td class="am-hide-sm-only">'+content.email+'</td><td class="am-hide-sm-only">'+content.mobile+'</td><td>'+content.birthDate+'</td><td><div class="am-btn-toolbar"><div class="am-btn-group am-btn-group-xs"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>编辑</button><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"  class="delebutton"><span class="am-icon-trash-o"></span>删除</button></div></div></td></tr>';
            $("#talentlist").append(tr);
            })
      }
    })
  //ajax实现分页的效果

})

 //jq弹框
  $(function() {
      $('.delebutton').on('click', function(e) {
        e.preventDefault();
        var $confirm = $('#my-confirm');
        var confirm = $confirm.data('am.modal');
        var onConfirm = function() {
            alert('你确定删除 ');
          };
        var onCancel = function() {
            alert('你不想删除 ');
          }

        if (confirm) {
          confirm.options.onConfirm =  onConfirm;
          confirm.options.onCancel =  onCancel;
          confirm.toggle(this);
        } else {
          $confirm.modal({
            relatedElement: this,
            onConfirm: onConfirm,
            onCancel: onCancel
          });
        }
      });
    });





