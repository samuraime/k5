$(function() {
    var $fullText = $('.admin-fullText');
    $('#admin-fullscreen').on('click', function() {
        $.AMUI.fullscreen.toggle();
    });

    $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
        $fullText.text($.AMUI.fullscreen.isFullscreen ? '退出全屏' : '开启全屏');
    });
});


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

var renderPagination = function(p) {
    $('#pagination-perpage').val(p.per_page);
    $('#pagination-page').val(p.current_page);
    $('#pagination-total').text(p.total);
    $('#pagination-last-page').text(p.last_page);

    var handleClick = function(page) {
        loadDataWithPagination(page);
    }

    var { total, per_page, current_page, last_page, next_page_url, prev_page_url, from, to } = p;
    var show_page_count = 5 > last_page ? last_page : 5;
    var left_offset = Math.floor((show_page_count - 1) / 2);
    var right_offset = Math.floor(show_page_count / 2);
    var start_page, end_page;

    if (last_page > show_page_count) {
        if (current_page - left_offset <= 0) {
            start_page = 1;
            end_page = show_page_count;
        } else if (current_page + right_offset > last_page ) {
            start_page = last_page - show_page_count;
            end_page = last_page;
        } else {
            start_page = current_page - left_offset;
            end_page = current_page + right_offset;
        }
    } else {
        start_page = 1;
        end_page = show_page_count;
    }

    var page = '<li id="pagination-first" class="'
        + (p.current_page == 1 ? 'am-disabled' : '') + '"><a data-page="1">第一页</a></li>'
        + '<li id="pagination-prev" class="'
        + (p.current_page == 1 ? 'am-disabled' : '') + '"><a data-page="' + (p.current_page - 1) + '">上一页</a></li>';

    for (var i = start_page; i <= end_page; i++) {
        page += '<li class="' + (i == p.current_page ? 'am-active' : '') + '"><a data-page="' + i + '">' + i + '</a></li>';
    }

    page += '<li id="pagination-first" class="'
        + (p.current_page + 1 >= p.last_page ? 'am-disabled' : '') + '"><a data-page="' + (p.current_page + 1) + '">下一页</a></li>'
        + '<li id="pagination-prev" class="'
        + (p.current_page + 1 >= p.last_page ? 'am-disabled' : '') + '"><a data-page="' + p.last_page + '">最末页</a></li>';
    $('#pagination ul').html(page);
}

var loadData = function(options) {
    $.get(window.location.pathname + '/list', options, function(data) {
        renderDataTable(data);
        renderPagination(data);
    });
}

var searchData = function() {
    $('#search-box-hidden-key').val($('#search-box-key').val());
    $('#search-box-hidden-value').val($('#search-box-value').val());

    loadData({
        searchKey: $('#search-box-key').val(),
        searchValue: $('#search-box-value').val(),
        perPage: $('#pagination-perpage').val(),
        page: $('#pagination-page').val(),
    });
}

var loadDataWithPagination = function(page) {
    loadData({
        searchKey: $('#search-box-hidden-key').val(),
        searchValue: $('#search-box-hidden-value').val(),
        perPage: $('#pagination-perpage').val(),
        page: page || $('#pagination-page').val(),
    });
}
