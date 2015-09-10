@extends('admin.layout')

@section('title', '用户管理')

@section('content')
<div class="am-cf am-padding border-bottom">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">数据列表</strong> / <small>企业列表</small></div>
</div>
<div class="am-g">
    <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-md">
                <button type="button" class="am-btn am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
                <button type="button" class="am-btn am-btn-primary"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
        </div>
    </div>
    <div class="am-u-sm-12 am-u-md-3">
        <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}">
                <option value="option1">所有类别</option>
                <option value="option2">IT业界</option>
                <option value="option3">数码产品</option>
                <option value="option3">笔记本电脑</option>
                <option value="option3">平板电脑</option>
                <option value="option3">只能手机</option>
                <option value="option3">超极本</option>
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
        <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
                <thead>
                    <tr>
                        <th class="table-check">
                            <input type="checkbox" />
                        </th>
                        <th class="table-id">ID</th>
                        <th class="table-name">登录名</th>
                        <th class="table-email">电子邮箱</th>
                        <th class="table-mobile am-hide-sm-only">电话</th>
                        <th class="table-date am-hide-sm-only">创建日期</th>
                        <th class="table-set">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>1</td>
                        <td>
                            <a href="#">Business management</a>
                        </td>
                        <td>default</td>
                        <td class="am-hide-sm-only">测试1号</td>
                        <td class="am-hide-sm-only">2014年9月4日 7:28:47</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="am-cf">
                共 15 条记录
                <div class="am-fr">
                    <ul class="am-pagination">
                        <li class="am-disabled">
                            <a href="#">«</a>
                        </li>
                        <li class="am-active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">»</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr />
            <p>注：.....</p>
        </form>
    </div>
</div>
@stop