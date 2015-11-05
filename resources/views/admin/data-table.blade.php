<div class="am-g">
    <div class="am-u-sm-12">
            <table id="data-table" class="am-table am-text-nowrap am-table-striped am-table-hover table-main">
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
    </div>
</div>
<script type="text/javascript">
$(function() {
    var renderDataTable = function(pagination) {
        var url = window.location.pathname;
        var tbody = '<tbody>';
        pagination.data.forEach(function(item) {
            var tr = '<tr data-id="' + item.id + '">';
            tr += '<td><input type="checkbox" /></td>';
            for (var i in dataTableFields) {
                tr += '<td>' + item[i] + '</td>';
            }
            tr += '<td><a class="am-btn am-btn-default am-btn-xs am-text-secondary data-table-edit" href="' + url +'/edit?id=' + item.id + '" target="_self"><span class="am-icon-pencil-square-o"></span>编辑</a><button class="am-btn am-btn-default am-btn-xs am-text-danger data-table-delete"><span class="am-icon-pencil-square-o"></span>删除</button></td></tr>';
            tbody += tr;
            // $('#data-table tbody').append(tr);
        });
        tbody += '</tbody>';
        $('#data-table tbody').replaceWith(tbody);
    }

    var loadData = function() {
        $.get(window.location.pathname + '/list', {
            searchKey: $('#search-box-key').val(),
            searchValue: $('#search-box-value').val(),
        }, function(data) {
            renderDataTable(data);
        });
    }

    // 初始化加载数据
    loadData();

    $('#search-box-form').submit(function(event) {
        event.preventDefault();
        loadData();
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
                        loadData();
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
        var ids = [];
        $('#data-table td input[type="checkbox"]:checked').each(function() {
            ids.push($(this).parents('tr').attr('data-id'));
        });
        if (ids.length) {
            $('#delete-list-confirm-modal').modal({
                relatedTarget: this,
                onConfirm: function() {
                    $.ajax({
                        url: window.location.pathname + '/list',
                        type: 'DELETE',
                        data: {ids: ids},
                        success: function() {
                            // ids.forEach(function(id) {
                            //     $('#data-table tr[data-id=' + id + ']').remove();
                            // });
                            loadData();
                        },
                        error: function() {
                            alert('删除失败');
                        }
                    });
                }
            });
        }
    });
});
</script>