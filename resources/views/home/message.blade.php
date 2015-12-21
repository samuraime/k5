@extends('home.layout')

@section('content')
<h1 class="h1 am-text-center">留言</h1>
<form id="add-form" class="am-form am-form-horizontal" data-am-validator method="POST">
    <div class="am-form-group">
        <label for="title" class="am-u-sm-2 am-form-label">留言主题:</label>
        <div class="am-u-sm-10">
            <input type="text" id="title" name="title" required minlength="1" maxlength="100" placeholder="留言主题">
        </div>
    </div>

    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">留言内容:</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" required minlength="1" placeholder="留言内容"></textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="type" class="am-u-sm-2 am-form-label">留言类型:</label>
        <div class="am-u-sm-10">
            <select id="type" name="type" required data-am-selected="{btnWidth: '100%'}">
                <option value="个人">个人</option>
                <option value="企业">企业</option>
            </select>
        </div>
    </div>

    <div class="am-form-group">
        <label for="name" class="am-u-sm-2 am-form-label">留言者名称:</label>
        <div class="am-u-sm-10">
            <input type="text" id="name" name="name" required minlength="1" maxlength="20" placeholder="留言者名称">
        </div>
    </div>

    <div class="am-form-group">
        <label for="mobile" class="am-u-sm-2 am-form-label">联系电话:</label>
        <div class="am-u-sm-10">
            <input type="text" id="mobile" name="mobile" required minlength="1" maxlength="20" placeholder="联系电话">
        </div>
    </div>

    <div class="am-form-group">
        <label for="email" class="am-u-sm-2 am-form-label">电子邮箱:</label>
        <div class="am-u-sm-10">
            <input type="email" id="email" name="email" required minlength="1" maxlength="100" placeholder="电子邮箱">
        </div>
    </div>

    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <button type="submit" class="am-btn am-btn-primary">提交</button>
        </div>
    </div>
</form>
@stop
