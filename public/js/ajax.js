$(document).ready(function(){
   //函数封装
   function listdata(){
    $.ajax({
    url:"/admin/personnel/list",
    type:"GET",
    dataType: "json",
    success: function (data) {
      $.each(data.data,function(index,content){
        var tr='<tr data-id="'+content.id+'"><td><input type="checkbox" class="selectable"  name="subBox"></td><td>'+content.id+'</td><td>'+content.name+'</td><td class="am-hide-sm-only">'+content.email+'</td><td class="am-hide-sm-only">'+content.mobile+'</td><td>'+content.birthDate+'</td><td><div class="am-btn-toolbar"><div class="am-btn-group am-btn-group-xs"><button class="am-btn am-btn-default am-btn-xs am-text-secondary dele-edit"><span class="am-icon-pencil-square-o"></span>编辑</button><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delebutton"><span class="am-icon-trash-o"></span>删除</button></div></div></td></tr>';
        $("#talent-list").append(tr);

      })
    }
  })

   }
   //全选 全部选效果
  //  $("#checkAll").click(function(){
  //   if(this.checked){
  //     $("input[name=subBox]").prop('checked', true)
  //   }else{
  //     $("input[name=subBox]").prop('checked', false)
  //   }
  // });

  //ajax导入人员列表数据
  $.ajax({
    url:"/admin/personnel/list",
    type:"GET",
    dataType: "json",
    success: function (data) {
      $.each(data.data,function(index,content){
        var tr='<tr data-id="'+content.id+'"><td><input type="checkbox" class="selectable"  name="subBox"></td><td>'+content.id+'</td><td>'+content.name+'</td><td class="am-hide-sm-only">'+content.email+'</td><td class="am-hide-sm-only">'+content.mobile+'</td><td>'+content.birthDate+'</td><td><div class="am-btn-toolbar"><div class="am-btn-group am-btn-group-xs"><button class="am-btn am-btn-default am-btn-xs am-text-secondary dele-edit"><span class="am-icon-pencil-square-o"></span>编辑</button><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delebutton"><span class="am-icon-trash-o"></span>删除</button></div></div></td></tr>';
        $("#talent-list").append(tr);

      })

      //jq弹框 删除
      $('#talent-list').find(".delebutton").on('click', function(e) {
        e.preventDefault();
        var id = $(this).parents('tr')[0].dataset['id'];
        var $confirm = $('#my-confirm');
        var confirm = $confirm.data('am.modal');
        var onConfirm = function() {
          $.ajax({
           type: "DELETE",
           url: "/admin/personnel",
           data:{id:id, _method:"DELETE"},
           dataType:'json',
           success: function () {
            $("#talent-list").empty();
          // alert("删除成功")
          listdata();

                     }
                   });
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


      //jq编辑
      $('#talent-list').find(".dele-edit").on('click', function(e) {
        e.preventDefault();
      var id = $(this).parents('tr')[0].dataset['id'];
      var $confirm = $('#my-confirm-edit');
      var confirm = $confirm.data('am.modal');
      $.ajax({
      url:"/admin/personnel/by-id",
      type:"GET",
      dataType: "json",
      data:{id:id},
      success: function (data) {
        $("#organization-form").empty()
      var html='<div class="am-form-group"><label for="doc-ipt-4-name" class="am-u-sm-2 am-form-label am-text-sm am-left-none">姓名</label><div class="am-u-sm-10"><input type="text" id="doc-ipt-4-name" name="name" value="'+data.name+'"></div></div><div class="am-form-group"><label for="doc-ipt-4-email" class="am-u-sm-2 am-form-label am-text-sm am-left-none">邮箱</label><div class="am-u-sm-10"><input type="email" id="doc-ipt-4-email" name="email" value="'+data.email+'"></div></div><div class="am-form-group"><label for="doc-ipt-4-mobile" class="am-u-sm-2 am-form-label am-text-sm am-left-none">电话</label><div class="am-u-sm-10"><input type="tel" id="doc-ipt-4-mobile" name="mobile" value="'+data.mobile+'"></div></div><div class="am-form-group"><label for="doc-ipt-4-birthDate" class="am-u-sm-2 am-form-label am-text-sm am-left-none">修改日期</label><div class="am-u-sm-10"><input type="date" id="doc-ipt-4-birthDate" name="birthDate" value="'+data.birthdate+'"></div></div>';
        $("#organization-form").append(html)
      }
      })
      var onConfirm = function() {
      var name=$("#doc-ipt-4-name").val();
      var email=$("#doc-ipt-4-email").val();
      var mobile=$("#doc-ipt-4-mobile").val();
      var birthdate=$("#doc-ipt-4-birthDate").val();
      console.log(name,email,mobile,birthdate)
     $.ajax({
      url:"/admin/personnel",
      type:"PUT",
      dataType: "json",
      data:{id:id,name:name,email:email,mobile:mobile,birth_date:birthdate,_method:"PUT"},
      success: function (data) {
         var onelist='<td><input type="checkbox" class="selectable"  name="subBox"></td><td>'+data.id+'</td><td>'+data.name+'</td><td class="am-hide-sm-only">'+data.email+'</td><td class="am-hide-sm-only">'+data.mobile+'</td><td>'+data.birth_date+'</td><td><div class="am-btn-toolbar"><div class="am-btn-group am-btn-group-xs"><button class="am-btn am-btn-default am-btn-xs am-text-secondary dele-edit"><span class="am-icon-pencil-square-o"></span>编辑</button><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delebutton"><span class="am-icon-trash-o"></span>删除</button></div></div></td>'
         $('[data-id=' + id + ']').html(onelist);

      }
    })
        // alert('你确定删除 ');
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
      }//success 结束
    })
  //全局新增列表
  $('#group-button').find(".all-new-add").on('click', function(e) {
    e.preventDefault();
    var $confirm = $('#my-confirm-add');
    var confirm = $confirm.data('am.modal');
    var onConfirm = function() {
      var name=$("#doc-ipt-3-name").val();
      var email=$("#doc-ipt-3-email").val();
      var mobile=$("#doc-ipt-3-mobile").val();
      var birth_date=$("#doc-ipt-3-birthDate").val();
      $.ajax({
       type:"POST",
       url:"/admin/personnel",
       dataType:"json",
       data:{name:name,email:email,mobile:mobile,birth_date:birth_date},
       success: function (data) {
         var html='<tr><td><input type="checkbox" class="selectable" name="items"></td><td>'+data.id+'</td><td>'+data.name+'</td><td class="am-hide-sm-only">'+data.email+'</td><td class="am-hide-sm-only">'+data.mobile+'</td><td>'+data.birth_date+'</td><td><div class="am-btn-toolbar"><div class="am-btn-group am-btn-group-xs"><button class="am-btn am-btn-default am-btn-xs am-text-secondary dele-edit"><span class="am-icon-pencil-square-o"></span>编辑</button><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delebutton"><span class="am-icon-trash-o"></span>删除</button></div></div></td></tr>';
         $("#talent-list").empty();
         listdata();

       }
           })
            // alert('取人删除')
          }

          var onCancel = function() {
           alert('不需要保存 ');
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
//全局删除列表
// 全选
       $("#checkAll").click(function() {
          $("input[name='subBox']").prop("checked",this.checked);
      });

      // 单选
      var subBox = $("input[name='subBox']")
      subBox.click(function() {
          $("#checkAll").prop("checked", subBox.length == subBox.filter(":checked").length ? true:false);
      });
$('#group-button').find(".all-dele-list").on('click', function(e) {
  e.preventDefault();
        // var ids = $("#talent-list").find('tr')[0].dataset['id'];
        var $confirm = $('#my-confirm');
        var confirm = $confirm.data('am.modal');
       // 判断是否至少选择一项
          var checkedNum = $("input[name='subBox']:checked").length;
          if(checkedNum == 0) {
              alert("请选择至少一项！");
              return;
          }
        var onConfirm = function() {
        // 批量选择
          if($(".am-modal-bd").text="确定删除吗？") {
              var checkedList = new Array();
              $("input[name='subBox']:checked").each(function() {
                 var ids=checkedList.push($(this).val());
              });
         $.ajax({
                    type: "DELETE",
                    url: "/admin/personnel/list",
                    data: {'ids':checkedList.toString(),_method:"DELETE"},
                    success: function(result) {
                        // $("[name ='subBox']:checkbox").attr("checked", false);

                    }
                });

        }
     // alert('你确定删除 ');
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





})

































