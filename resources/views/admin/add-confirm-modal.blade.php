<!-- 新增条目结果框 start -->
<div class="am-modal am-modal-confirm" tabindex="-1" id="add-confirm-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"></div>
        <div class="am-modal-bd">
            操作成功
        </div>
        <div class="am-modal-footer">
            <a id="add-confirm-continue" class="am-btn">继续新增</a>
            <a id="add-confirm-list" class="am-btn">返回列表</a>
            <a id="add-confirm-view" data-id="" class="am-btn">返回查看</a>
            <a id="add-confirm-edit" data-id="" class="am-btn">返回编辑</a>
        </div>
    </div>
</div>
<!-- 新增条目结果框 end -->
<script type="text/javascript">
function addConfirm(id) {
    $('#add-confirm-view').attr('data-id', id);
    $('#add-confirm-edit').attr('data-id', id);
    $('#add-confirm-modal').modal('open');
}

$('#add-confirm-continue').click(function(event) {
    event.preventDefault();
    window.location.reload();
});

$('#add-confirm-list').click(function(event) {
    event.preventDefault();
    window.location.href = window.location.pathname.match(/^\/admin\/\w+\//i);
});

$('#add-confirm-view').click(function(event) {
    event.preventDefault();
    if ($(this).attr('data-id')) {
        window.location.href = window.location.pathname.replace(/\/new/i, '/view?id=') + $(this).attr('data-id');
    }
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
                        alert(data);
                    }
                });

                return false;
            }

            return false;
        }
    });
});
</script>