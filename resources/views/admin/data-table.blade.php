<div class="am-g">
    <div class="am-u-sm-12 am-scrollable-horizontal">
        <table id="data-table" class="am-table am-table-bordered am-table-striped am-text-nowrap am-table-hover table-main">
            <thead>
                <tr>
                    <th class="table-check">
                        <input type="checkbox" />
                    </th>
                    @foreach ($fields as $field) 
                    <th>{{ $field }}</th>
                    @endforeach
                    <th class="table-set">操作</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        @include('admin.pagination')
    </div>
</div>
<script type="text/javascript">
    $(function() {


    // 初始化加载数据
    loadData();

    $('#search-box-form').submit(function(event) {
        event.preventDefault();
        searchData();
    });
    $('.data-table-delete').on('click', function() {
        alert(1)
    })

    /* 数据列表单个删除 */
    $('#data-table').on('click', '.data-table-delete', function(event) {
        $('#delete-confirm-modal').modal({
            relatedTarget: this,
            onConfirm: function() {
                var item = $(this.relatedTarget).parents('tr');
                $.ajax({
                    type: 'DELETE',
                    data: {id: item.attr('data-id')},
                    success: function() {
                        // item.remove();
                        loadDataWithPagination();
                    },
                    error: function() {
                        alert('删除失败');
                    }
                });
            }
        });
    });

    /* 数据列表全选 */
    $('#data-table th input[type="checkbox"]').click(function() {
        $('#data-table input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });

    /* 批量删除 */
    $('#delete-items').click(function() {
        if ($('#data-table td input[type="checkbox"]:checked').length) {
            $('#delete-list-confirm-modal').modal({
                relatedTarget: this,
                onConfirm: function() {
                    var ids = [];
                    $('#data-table td input[type="checkbox"]:checked').each(function() {
                        ids.push($(this).parents('tr').attr('data-id'));
                    });

                    $.ajax({
                        url: window.location.pathname + '/list',
                        type: 'DELETE',
                        data: {ids: ids},
                        success: function() {
                            loadDataWithPagination();
                        },
                        error: function() {
                            alert('删除失败');
                        }
                    });
                }
            });
        }
    });

    $('#add-item').click(function() {
        window.location.href = window.location.pathname + '/new';
    });
});
</script>