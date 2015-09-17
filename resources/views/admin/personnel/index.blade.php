@extends('admin.layout')

@section('title', '人才列表')

@section('head-assets')

@stop

@section('content')
<div class="am-cf am-padding border-bottom">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">数据列表</strong> / <small>企业列表</small></div>
</div>
<ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
    <li>
        <a href="#" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span>
            <br>新增页面
            <br>2300</a>
    </li>
    <li>
        <a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span>
            <br>成交订单
            <br>308</a>
    </li>
    <li>
        <a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span>
            <br>昨日访问
            <br>80082</a>
    </li>
    <li>
        <a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-user-md"></span>
            <br>在线用户
            <br>3000</a>
    </li>
</ul>
<div class="am-g">
    <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-md" id="group-button">
                <button type="button" class="am-btn am-btn-primary all-new-add"><span class="am-icon-plus"></span> 新增</button>
                <button type="button" class="am-btn am-btn-primary all-dele-list"><span class="am-icon-trash-o" id='delete'></span> 删除</button>
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
                        <th class="table-check am-text-middle">
                            <input type="checkbox" id="delete-all"/>
                        </th>
                        <th class="table-id">ID</th>
                        <th class="table-title">姓名</th>
                        <th class="table-type">邮箱</th>
                        <th class="table-author am-hide-sm-only">电话</th>
                        <th class="table-date am-hide-sm-only">修改日期</th>
                        <th class="table-set">操作</th>
                    </tr>
                </thead>
                <tbody id="talent-list">
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

@section('foot-assets')
<script src="/js/ajax.js"></script>
@stop