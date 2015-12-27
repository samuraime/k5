<!-- 新增条目结果框 start -->
<div class="am-modal am-modal-confirm" tabindex="-1" id="edit-confirm-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"></div>
        <div class="am-modal-bd am-text-success">
            保存成功
        </div>
        <div class="am-modal-footer">
            <span id="edit-confirm-list" class="am-modal-btn am-text-secondary">返回列表</span>
            <span id="edit-confirm-edit" class="am-modal-btn am-text-primary">继续修改</span>
        </div>
    </div>
</div>
<!-- 新增条目结果框 end -->
<script type="text/javascript">
function editConfirm(id) {
    $('#edit-confirm-edit').attr('data-id', id);
    var modal = $('#edit-confirm-modal');
    modal.modal({
        closeViaDimmer: true,        
    });
    $('#edit-confirm-modal').modal('open');
}

$('#edit-confirm-list').click(function(event) {
    event.preventDefault();
    window.location.href = window.location.pathname.match(/^\/admin\/\w+\//i);
});

$('#edit-confirm-edit').click(function(event) {
    $('#edit-confirm-modal').modal('close');
});
</script>

<script type="text/javascript">
$(function() {
    $('#edit-form').validator({
        submit: function() {
            if (this.isFormValid()) {
                var data = new FormData(document.getElementById('edit-form'));
                data.append('_method', 'PUT');
                $.ajax({
                    url: window.location.pathname.match(/^\/admin\/\w+/i),
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        editConfirm(data.id);
                    },
                    error: function(data) {
                        console.log(data);
                        alert('额...好像哪里出错了, 刷新重试一下', 'danger');
                    }
                });

                return false;
            }

            return false;
        }
    });
});
</script>