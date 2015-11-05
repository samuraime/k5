<div class="am-g">
    <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-md">
                <button type="button" class="am-btn am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
                <button type="button" class="am-btn am-btn-primary"><span class="am-icon-save"></span> 保存</button>
                <button id="delete-items" type="button" class="am-btn am-btn-primary"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
        </div>
    </div>
    <div class="am-u-sm-12 am-u-md-3">
        <div class="am-form-group">
            <select id="search-box-key" data-am-selected="{btnSize: 'sm'}">
                <option selected>搜索选项</option>
                @foreach ($fields as $key => $field)
                <option value="{{ $key }}">{{ $field }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <form id="search-box-form" class="am-u-sm-12 am-u-md-3">
        <div class="am-input-group am-input-group-sm">
            <input id="search-box-value" type="text" class="am-form-field">
            <span class="am-input-group-btn">
              <button id="search-box-search"class="am-btn am-btn-default" type="submit">搜索</button>
            </span>
        </div>
    </form>
</div>