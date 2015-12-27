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
                        <label for="name" class="am-u-sm-2 am-form-label">姓名:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="name" name="name" placeholder="姓名">
                        </div>
                        <label for="gender" class="am-u-sm-2 am-form-label">性别:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="gender" name="gender" placeholder="性别">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="nationality" class="am-u-sm-2 am-form-label">国籍:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="nationality" name="nationality" placeholder="国籍">
                        </div>
                        <label for="nation" class="am-u-sm-2 am-form-label">民族:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="nation" name="nation" placeholder="民族">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="birth" class="am-u-sm-2 am-form-label">出生年月:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="birth" name="birth" placeholder="出生年月">
                        </div>
                        <label for="martial" class="am-u-sm-2 am-form-label">婚姻状况:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="martial" name="martial" placeholder="婚姻状况">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="birthAddress" class="am-u-sm-2 am-form-label">籍贯:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="birthAddress" name="birthAddress" placeholder="籍贯">
                        </div>
                        <label for="registeredAddress" class="am-u-sm-2 am-form-label">户口所在地:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="registeredAddress" name="registeredAddress" placeholder="户口所在地">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="politicsStatus" class="am-u-sm-2 am-form-label">政治面貌:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="politicsStatus" name="politicsStatus" placeholder="政治面貌">
                        </div>
                        <label for="degree" class="am-u-sm-2 am-form-label">最高学历:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="degree" name="degree" placeholder="最高学历">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="professionalTitle" class="am-u-sm-2 am-form-label">职称:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="professionalTitle" name="professionalTitle" placeholder="职称">
                        </div>
                        <label for="workYear" class="am-u-sm-2 am-form-label">工作经验:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="workYear" name="workYear" placeholder="工作经验">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="telephone" class="am-u-sm-2 am-form-label">联系电话:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="telephone" name="telephone" placeholder="联系电话">
                        </div>
                        <label for="mobile" class="am-u-sm-2 am-form-label">手机号码:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="mobile" name="mobile" placeholder="手机号码">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="email" class="am-u-sm-2 am-form-label">电子邮箱:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="email" name="email" placeholder="电子邮箱">
                        </div>
                        <label for="address" class="am-u-sm-2 am-form-label">联系地址:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="address" name="address" placeholder="联系地址">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="school1" class="am-u-sm-2 am-form-label">毕业学校1:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="school1" name="school1" placeholder="毕业学校1">
                        </div>
                        <label for="major1" class="am-u-sm-2 am-form-label">毕业专业1:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="major1" name="major1" placeholder="毕业专业1">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="school2" class="am-u-sm-2 am-form-label">毕业学校2:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="school2" name="school2" placeholder="毕业学校2">
                        </div>
                        <label for="major2" class="am-u-sm-2 am-form-label">毕业专业2:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="major2" name="major2" placeholder="毕业专业2">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="school3" class="am-u-sm-2 am-form-label">毕业学校3:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="school3" name="school3" placeholder="毕业学校3">
                        </div>
                        <label for="major3" class="am-u-sm-2 am-form-label">毕业专业3:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="major3" name="major3" placeholder="毕业专业3">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="returnee" class="am-u-sm-2 am-form-label">是否海归:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="returnee" name="returnee" placeholder="是否海归">
                        </div>
                        <label for="foreignOffice" class="am-u-sm-2 am-form-label">归国前单位:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="foreignOffice" name="foreignOffice" placeholder="归国前单位">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="office" class="am-u-sm-2 am-form-label">用人单位/创办企业:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office" name="office" placeholder="职称">
                        </div>
                        <label for="position" class="am-u-sm-2 am-form-label">职务:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="position" name="position" placeholder="职务">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="type" class="am-u-sm-2 am-form-label">人才类型:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="type" name="type" placeholder="人才类型">
                        </div>
                        <label for="category" class="am-u-sm-2 am-form-label">人才分类:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="category" name="category" placeholder="人才分类">
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
                        <label for="type" class="am-u-sm-2 am-form-label">经历类型:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="type" name="type" placeholder="经历类型">
                        </div>
                        <label for="office" class="am-u-sm-2 am-form-label">单位:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office" name="office" placeholder="单位">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="start" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="start" name="start" placeholder="开始时间">
                        </div>
                        <label for="end" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="end" name="end" placeholder="结束时间">
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
                        <label for="date" class="am-u-sm-2 am-form-label">评定年月:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="date" name="date" placeholder="评定年月">
                        </div>
                        <label for="batch" class="am-u-sm-2 am-form-label">批次:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="batch" name="batch" placeholder="批次">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="category" class="am-u-sm-2 am-form-label">人才分类:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="category" name="category" placeholder="人才分类">
                        </div>
                        <label for="type" class="am-u-sm-2 am-form-label">人才类型:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="type" name="type" placeholder="人才类型">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="result" class="am-u-sm-2 am-form-label">评定结果:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="result" name="result" placeholder="评定结果">
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
                        <label for="name" class="am-u-sm-2 am-form-label">项目名称:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="name" name="name" placeholder="项目名称">
                        </div>
                        <label for="desc" class="am-u-sm-2 am-form-label">项目情况:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="desc" name="desc" placeholder="项目情况">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="status" class="am-u-sm-2 am-form-label">项目状态:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="status" name="status" placeholder="项目状态">
                        </div>
                        <label for="progress" class="am-u-sm-2 am-form-label">项目进程:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="progress" name="progress" placeholder="项目进程">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="start" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="start" name="start" placeholder="开始时间">
                        </div>
                        <label for="end" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="end" name="end" placeholder="结束时间">
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
<!--     <div class="am-panel am-panel-default">
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
                            <input type="text" id="title" name="title" placeholder="工作单位">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">职务:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="title" name="title" placeholder="职务">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="title" name="title" placeholder="开始时间">
                        </div>
                        <label for="title" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="title" name="title" placeholder="结束时间">
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
    </div> -->
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
                        <label for="relation" class="am-u-sm-2 am-form-label">联系人关系:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation" name="relation" placeholder="联系人关系">
                        </div>
                        <label for="name" class="am-u-sm-2 am-form-label">联系人姓名:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="name" name="name" placeholder="联系人姓名">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="office" class="am-u-sm-2 am-form-label">联系人单位:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office" name="office" placeholder="联系人单位">
                        </div>
                        <label for="position" class="am-u-sm-2 am-form-label">联系人职务:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="position" name="position" placeholder="联系人职务">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="mobile" class="am-u-sm-2 am-form-label">联系人手机号:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="mobile" name="mobile" placeholder="联系人手机号">
                        </div>
                        <label for="qq" class="am-u-sm-2 am-form-label">联系人QQ:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="qq" name="qq" placeholder="联系人QQ">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="office_phone" class="am-u-sm-2 am-form-label">联系人办公电话:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office_phone" name="office_phone" placeholder="联系人办公电话">
                        </div>
                        <label for="fax" class="am-u-sm-2 am-form-label">联系人传真:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="fax" name="fax" placeholder="联系人传真">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="email" class="am-u-sm-2 am-form-label">联系人E-mail:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="email" name="email" placeholder="联系人E-mail">
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