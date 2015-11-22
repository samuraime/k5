@extends('admin.layout')

@section('title', '新增账号')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增账号')

@section('content')
<form class="am-form am-form-horizontal">
    <div class="am-form-group">
        <label for="name" class="am-u-sm-2 am-form-label">企业名称</label>
        <div class="am-u-sm-10">
            <input type="text" id="name" name="name" placeholder="企业名称">
        </div>
    </div>

    <div class="am-form-group">
        <label for="type" class="am-u-sm-2 am-form-label">公司类型</label>
        <div class="am-u-sm-10">
            <select id="type" name="type">
                <option value="">私营有限责任公司</option>
            </select>
        </div>
    </div>

    <div class="am-form-group">
        <label for="capital" class="am-u-sm-2 am-form-label">注册资本</label>
        <div class="am-u-sm-10">
            <input type="text" id="capital" name="capital" placeholder="注册资本">
        </div>
    </div>

    <div class="am-form-group">
        <label for="office_address" class="am-u-sm-2 am-form-label">办公地址</label>
        <div class="am-u-sm-10">
            <input type="text" id="office_address" name="office_address" placeholder="办公地址">
        </div>
    </div>

    <div class="am-form-group">
        <label for="area" class="am-u-sm-2 am-form-label">占地面积</label>
        <div class="am-u-sm-10">
            <input type="text" id="area" name="area" placeholder="占地面积">
        </div>
    </div>

    <div class="am-form-group">
        <label for="staff_scale" class="am-u-sm-2 am-form-label">员工规模</label>
        <div class="am-u-sm-10">
            <select id="staff_scale" name="staff_scale">
                <option>1-100</option>
            </select>
        </div>
    </div>

    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <button type="submit" class="am-btn am-btn-primary">提交</button>
        </div>
    </div>
</form>
@stop

@section('foot-assets')

@stop