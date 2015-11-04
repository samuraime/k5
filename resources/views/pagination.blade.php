<hr/>
<div class="pagination am-g">
    <div class="am-u-12">
        <form class="am-form am-fr">
            共  {{ $total }}  条记录, 每页显示
            <input type="text" ref="perPage" placeholder="{{ $per_page }}" />
            条记录, 当前
            <input type="text" ref="page" placeholder="{{ $current_page }}"/>
             / {{ $last_page }}  页
        </form>
    </div>
    <div class="am-u-12">
        <ul class="am-fr am-pagination">
            <li 
                @if ($current_page == 1)
                 class="am-disabled" 
                @endif
            >
                <a href="{{ $url . '?page=1' }}">第一页</a>
            </li>
            <li 
                @if ($current_page == 1)
                 class="am-disabled" 
                @endif
            >
                <a href="{{ $url . '?page=' . ($current_page - 1)}}">上一页</a>
            </li>    
            @for ($i = $start_page; $i <= $end_page; $i++)     
            <li 
                @if ($i == $current_page)
                 class="am-active" 
                @endif
            >
                <a href="{{ $url . '?page=' . $i}}">{{ $i }}</a>
            </li>
            @endfor
            <li 
                @if ($current_page == $last_page)
                 class="am-disabled" 
                @endif
            >
                <a href="{{ $url . '?page=' . ($current_page + 1)}}">下一页</a>
            </li>
            <li 
                @if ($current_page == $last_page)
                 class="am-disabled" 
                @endif
            >
                <a href="{{ $url . '?page=' . $last_page}}">最末页</a>
            </li>
        </ul>
    </div>
</div>