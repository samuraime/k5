<hr/>
<div id="pagination" class="pagination am-g">
    <div class="am-u-12">
        <form id="pagination-form" class="am-form am-fr">
            共  <span id="pagination-total"></span>  条记录, 每页显示
            <input type="text" id="pagination-perpage" ref="perPage" placeholder="" />
            条记录, 当前
            <input type="text" id="pagination-page" ref="page" placeholder=""/>
            / <span id="pagination-last-page"></span>  页
            <input type="submit" class="am-hide" />
        </form>
    </div>
    <div class="am-u-12">
        <ul class="am-fr am-pagination">
            <li id="pagination-first">
                <a href="">第一页</a>
            </li>
            <li  id="pagination-prev">
                <a href="">上一页</a>
            </li>    
            <li  id="pagination-next">
                <a href="">下一页</a>
            </li>
            <li  id="pagination-last">
                <a href="">最末页</a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $('#pagination').on('click', 'li a', function(event) {
        loadDataWithPagination($(this).attr('data-page'));
    });

    $('#pagination form').submit(function(event) {
        event.preventDefault();
        loadDataWithPagination();
    });
</script>