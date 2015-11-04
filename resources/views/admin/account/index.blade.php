@extends('admin.layout')

@section('title', '账号管理')

@section('content')
<div class="am-cf am-padding border-bottom">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">系统管理</strong> / <small>账号管理</small></div>
</div>

@include('admin.search-box')

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