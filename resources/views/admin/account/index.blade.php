@extends('admin.layout')

@section('title', '企业列表')

@section('content')
<div class="am-cf am-padding border-bottom">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">数据列表</strong> / <small>企业列表</small></div>
</div>

<div class="am-g">
    <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-md">
                <button type="button" class="am-btn am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
                <button type="button" class="am-btn am-btn-primary"><span class="am-icon-save"></span> 保存</button>
                <button type="button" class="am-btn am-btn-primary"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
        </div>
    </div>
    <div class="am-u-sm-12 am-u-md-3">
        <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}">
                @foreach ($fields as $key => $field)
                <option value="{{ $key }}">{{ $field }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="am-u-sm-12 am-u-md-3">
        <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-default" type="button">搜索</button>
            </span>
        </div>
    </div>
</div>
<div class="am-g">
    <div class="am-u-sm-12">
        <form class="am-form am-scrollable-horizontal">
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
                    @foreach ($data as $item)
                    <tr data-id="{{ $item['id'] }}">
                        <td>
                            <input type="checkbox" />
                        </td>
                        @foreach ($fields as $key => $field)
                        <td>{{ $item[$key] }}</td>
                        @endforeach
                        <td>
                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="{{ $url . '/edit?id=' . $item['id'] }}" target="_self"><span class="am-icon-pencil-square-o"></span>编辑</a>
                            <a class="am-btn am-btn-default am-btn-xs am-text-danger data-table-delete" href="{{ $url . '/delete?id=' . $item['id'] }}"><span class="am-icon-pencil-square-o"></span>删除</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        @include('pagination')
    </div>
</div>
@stop