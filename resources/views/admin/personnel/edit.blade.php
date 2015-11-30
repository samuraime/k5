@extends('admin.layout')

@section('title', '新增人才')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增人才')

@section('content')
<div class="am-panel-group" id="accordion">
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-personnel'}">
                基本信息
            </h4>
        </div>
        <div id="collapse-personnel" class="am-panel-collapse am-collapse am-in">
            <div class="am-panel-bd">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">姓名:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="姓名">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">性别:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="性别">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">国籍:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="国籍">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">民族:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="民族">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">出生年月:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="出生年月">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">婚姻状况:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="婚姻状况">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">籍贯:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="籍贯">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">户口所在地:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="户口所在地">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">政治面貌:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="政治面貌">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">最高学历:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="最高学历">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">职称:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="职称">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">工作经验:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="工作经验">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">联系电话:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系电话">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">手机号码:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="手机号码">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">电子邮箱:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="电子邮箱">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">联系地址:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系地址">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">毕业学校1:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="毕业学校1">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">毕业专业1:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="毕业专业1">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">毕业学校2:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="毕业学校1">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">毕业专业2:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="毕业专业1">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">毕业学校3:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="毕业学校1">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">毕业专业3:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="毕业专业1">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">是否海归:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="是否海归">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">归国前单位:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="归国前单位">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">用人单位/创办企业:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="职称">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">职务:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="职务">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">人才分类:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="人才分类">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">人才类型:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="人才类型">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-experience'}">
                经历信息
            </h4>
        </div>
        <div id="collapse-experience" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">经历类型:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="经历类型">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">单位:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="单位">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="开始时间">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="结束时间">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="content" class="am-u-sm-2 am-form-label">内容:</label>
                        <div class="am-u-sm-10">
                            <textarea rows="10" id="content" name="content" placeholder="内容"></textarea>
                        </div>
                    </div>   

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-assessment'}">
                评定信息
            </h4>
        </div>
        <div id="collapse-assessment" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">评定年月:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="评定年月">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">批次:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="批次">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">人才分类:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="人才分类">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">人才类型:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="人才类型">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">评定结果:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="评定结果">
                        </div>
                        <div class="am-u-sm-6">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-project'}">
                项目信息
            </h4>
        </div>
        <div id="collapse-project" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">项目名称:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="项目名称">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">项目情况:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="项目情况">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">项目状态:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="项目状态">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">项目进程:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="项目进程">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="开始时间">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="结束时间">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-enterprise'}">
                工作单位信息
            </h4>
        </div>
        <div id="collapse-enterprise" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">工作单位:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="工作单位">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">职务:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="职务">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="开始时间">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="结束时间">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-relation'}">
                联系人相关信息
            </h4>
        </div>
        <div id="collapse-relation" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">联系人关系:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人关系">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">联系人姓名:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人姓名">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">联系人单位:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人单位">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">联系人职务:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人职务">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">联系人手机号:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人手机号">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">联系人QQ:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人QQ">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">联系人办公电话:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人办公电话">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">联系人传真:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人传真">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">联系人E-mail:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="title" name="title" placeholder="联系人E-mail">
                        </div>
                        <div class="am-u-sm-6">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('foot-assets')

@stop