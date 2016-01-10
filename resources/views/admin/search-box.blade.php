<div class="am-g">
    @if (preg_match('/^\/admin\/talent|enterprise|log|message/i', $_SERVER['REQUEST_URI']))
    <div class="am-u-md-3">
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-md">
                <button id="add-item" type="button" class="am-btn am-btn-primary @if (preg_match('/^\/admin\/message/i', $_SERVER['REQUEST_URI'])) am-hide @endif"><span class="am-icon-plus"></span> 新增</button>
                <button id="delete-items" type="button" class="am-btn am-btn-primary"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
        </div>
    </div>
    <div class="am-u-md-3">
        <button id="export-modal-trigger" type="button" class="am-btn am-btn-secondary am-round "><span class="am-icon-file-excel-o"></span> 导出数据</button>
    </div>
    @else
    <div class="am-u-md-6">
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-md">
                <button id="add-item" type="button" class="am-btn am-btn-primary @if (preg_match('/^\/admin\/message/i', $_SERVER['REQUEST_URI'])) am-hide @endif"><span class="am-icon-plus"></span> 新增</button>
                <button id="delete-items" type="button" class="am-btn am-btn-primary"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
        </div>
    </div>
    @endif
    <div class="am-u-md-3">
        <div class="am-form-group">
            <select id="search-box-key" data-am-selected="{btnSize: 'sm'}">
                <option selected>搜索选项</option>
                @foreach ($fields as $key => $field)
                <option value="{{ $key }}">{{ $field }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <form id="search-box-form" class="am-u-md-3">
        <input type="hidden" id="search-box-hidden-key"/>
        <input type="hidden" id="search-box-hidden-value"/>
        <div class="am-input-group am-input-group-sm">
            <input id="search-box-value" type="text" class="am-form-field">
            <span class="am-input-group-btn">
              <button id="search-box-search"class="am-btn am-btn-default" type="submit">搜索</button>
            </span>
        </div>
    </form>
</div>
<!-- 数据导出模态框 start -->
<div class="am-modal am-modal-confirm" tabindex="-1" id="export-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd am-text-primary">数据导出<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a></div>
        <div class="am-modal-bd">
            <form id="export-form" class="am-form am-form-horizontal" data-am-validator>
                <p class="am-text-secondary">筛选数据: 选择需要导出数据的创建时间区间</p>
                <div class="am-g">
                    <div class="am-u-sm-6 am-form-group">
                        <div class="am-input-group am-datepicker-date" data-am-datepicker="{format: 'yyyy-mm-dd'}">
                            <input type="text" name="start" class="am-form-field" placeholder="创建时间起" pattern="^\d{4}-\d{2}-\d{2}$" />
                            <span class="am-input-group-btn am-datepicker-add-on">
                                <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
                            </span>
                        </div>
                    </div>
                    <div class="am-u-sm-6 am-form-group">
                        <div class="am-input-group am-datepicker-date" data-am-datepicker="{format: 'yyyy-mm-dd'}">
                            <input type="text" name="end" class="am-form-field" placeholder="创建时间止" pattern="^\d{4}-\d{2}-\d{2}$" />
                            <span class="am-input-group-btn am-datepicker-add-on">
                                <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn am-text-secondary" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn am-text-primary"data-am-modal-confirm>导出</span>
        </div>
    </div>
</div>
<!-- 数据导出模态框 end -->
<script type="text/javascript">
$(function() {
    $('#export-modal-trigger').click(function() {
        var exportModal = $('#export-modal');
        exportModal.modal({
            closeOnConfirm: false,
            onConfirm: function() {
                window.location.href = window.location.pathname + '/export?start=' + exportModal.find('[name=start]').val()　+ '&end=' +　exportModal.find('[name=end]').val();
            },
        });

        $('#export-modal').modal('open');
    });
});
</script>