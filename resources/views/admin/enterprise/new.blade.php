@extends('admin.layout')

@section('title', '新增企业')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增')

@section('content')
@include('admin.add-confirm-modal')
<form id="add-form" class="am-form am-form-horizontal" data-am-validator method="POST" action="/admin/enterprise">
    <div class="am-form-group">
        <label for="name" class="am-u-sm-2 am-form-label">企业名称:</label>
        <div class="am-u-sm-10">
            <input type="text" id="name" name="name" required minlength="1" placeholder="企业名称">
        </div>
    </div>

    <div class="am-form-group">
        <label for="type" class="am-u-sm-2 am-form-label">公司类型:</label>
        <div class="am-u-sm-10">
            <select id="type" name="type" required data-am-selected="{btnWidth: '100%'}">
                @foreach ($typeMap as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="am-form-group">
        <label for="staff_scale" class="am-u-sm-2 am-form-label">员工规模:</label>
        <div class="am-u-sm-10">
            <select id="staff_scale" name="staff_scale" data-am-selected="{btnWidth: '100%'}">
                @foreach ($staffScaleMap as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="am-form-group">
        <label for="operation_scale" class="am-u-sm-2 am-form-label">经营规模:</label>
        <div class="am-u-sm-10">
            <select id="operation_scale" name="operation_scale" data-am-selected="{btnWidth: '100%'}">
                @foreach ($operationScaleMap as $key => $value) 
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="am-form-group">
        <label for="capital" class="am-u-sm-2 am-form-label">注册资本:</label>
        <div class="am-u-sm-10">
            <input type="text" id="capital" name="capital" pattern="^\d+$" placeholder="注册资本">
        </div>
    </div>

    <div class="am-form-group">
        <label for="office_address" class="am-u-sm-2 am-form-label">办公地址:</label>
        <div class="am-u-sm-10">
            <input type="text" id="office_address" name="office_address" placeholder="办公地址">
        </div>
    </div>

    <div class="am-form-group">
        <label for="area" class="am-u-sm-2 am-form-label">占地面积:</label>
        <div class="am-u-sm-10">
            <input type="text" id="area" name="area" maxlength="20" placeholder="占地面积">
        </div>
    </div>

    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <button type="submit" class="am-btn am-btn-primary">保存</button>
        </div>
    </div>
</form>
@stop

@section('foot-assets')

@stop