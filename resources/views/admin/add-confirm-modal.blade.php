<!-- 新增条目结果框 start -->
<div class="am-modal am-modal-confirm" tabindex="-1" id="add-confirm-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"></div>
        <div class="am-modal-bd am-text-success">
            操作成功
        </div>
        <div class="am-modal-footer">
            <!-- <span id="add-confirm-list" class="am-modal-btn am-text-secondary">返回列表</span> -->
            <span id="add-confirm-new" class="am-modal-btn am-text-secondary">继续新增</span>
            <span id="add-confirm-edit" class="am-modal-btn am-text-primary">返回查看</span>
        </div>
    </div>
</div>
<!-- 新增条目结果框 end -->
<script type="text/javascript">
function addConfirm(id) {
    $('#add-confirm-edit').attr('data-id', id);
    var modal = $('#add-confirm-modal');
    modal.modal({
        closeViaDimmer: false,        
    });
    $('#add-confirm-modal').modal('open');
}

$('#add-confirm-new').click(function(event) {
    event.preventDefault();
    window.location.reload();
});

$('#add-confirm-list').click(function(event) {
    event.preventDefault();
    window.location.href = window.location.pathname.match(/^\/admin\/\w+\//i);
});

$('#add-confirm-edit').click(function(event) {
    event.preventDefault();
    if ($(this).attr('data-id')) {
        window.location.href = window.location.pathname.replace(/\/new/i, '/edit?id=') + $(this).attr('data-id');
    }
});
</script>

<script type="text/javascript">
$(function() {
    $('#add-form').validator({
        submit: function() {
            if (this.isFormValid()) {
                $.ajax({
                    url: window.location.pathname.match(/^\/admin\/\w+/i),
                    method: 'POST',
                    data: new FormData(document.getElementById('add-form')),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        addConfirm(data.id);
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