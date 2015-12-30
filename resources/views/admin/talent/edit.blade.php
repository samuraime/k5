@extends('admin.layout')

@section('title', '编辑人才')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '编辑')

@section('content')
<!-- 新增条目结果框 start -->
<div class="am-modal am-modal-confirm" tabindex="-1" id="add-confirm-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"></div>
        <div class="am-modal-bd am-text-success">
            操作成功
        </div>
        <div class="am-modal-footer">
            <!-- <span id="add-confirm-list" class="am-modal-btn am-text-warning">返回列表</span> -->
            <span id="add-confirm-new" class="am-modal-btn am-text-warning">重新新增</span>
            <span id="add-confirm-edit" class="am-modal-btn am-text-primary">继续编辑</span>
        </div>
    </div>
</div>
<!-- 新增条目结果框 end -->

<!-- 单条目删除模态框 start -->
<div class="am-modal am-modal-confirm" tabindex="-1" id="delete-confirm-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"></div>
        <div class="am-modal-bd am-text-danger">
            确定要删除此信息吗？
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>确定</span>
        </div>
    </div>
</div>
<!-- 单条目删除模态框 end -->
<script type="text/javascript">
function addConfirm() {
    $('#add-confirm-modal').modal('open');
}

$('#add-confirm-new').click(function(event) {
    event.preventDefault();
    window.location.reload();
});

$('#add-confirm-list').click(function(event) {
    event.preventDefault();
    window.location.href = window.location.pathname.match(/^\/admin\/\w+\//i);
});

$('#add-confirm-edit').click(function(event) {
    $('#add-confirm-modal').modal('close');
});

function setTid(id) {
    console.log(id)
    $('.tid').val(id);
}

function setId(form, id) {
    $(form).find('.id').val(id);
}

var validator = {
    submit: function() {
        var form = this.$element[0];
        var isMainForm = form.getAttribute('id').indexOf('talent-') == -1;
        if (!(isMainForm || $(form).find('.tid').val())) {
            alert('请先保存基本信息', 'warning');
            return false;
        }
        var hasPrimaryKey = $(form).find('#id').val();
        var formData = new FormData(form);
        hasPrimaryKey && formData.append('_method', 'PUT');
        var url = '/admin/talent' + (isMainForm ? '' : '/' + form.getAttribute('id').replace(/talent-/, ''));
        if (this.isFormValid()) {
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (isMainForm) {
                        setTid(data.id);
                    }
                    setId(form, data.id);
                    addConfirm();
                },
                error: function(data) {
                    console.log(data);
                    alert('额...好像哪里出错了, 刷新重试一下', 'danger');
                }
            });

            return false;
        }

        return false;
    }
}
$(function() {
    $('.talent-form').validator(validator);
});
</script>
<div class="am-panel-group" id="accordion">
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-talent'}">
                <span class="am-text-primary info-title">基本信息</span>
            </h4>
        </div>
        <div id="collapse-talent" class="am-panel-collapse am-collapse am-in">
            <div class="am-panel-bd">
                <form id="main-form" class="am-form am-form-horizontal talent-form" data-am-validator>
                    <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="{{ $talent->id }}" />
                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-2 am-form-label">姓名:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="name" name="name" required maxlength="50" placeholder="姓名" value="{{ $talent->name }}" >
                        </div>
                        <label for="gender" class="am-u-sm-2 am-form-label">性别:</label>
                        <div class="am-u-sm-4">
                            <select id="gender" name="gender" minlength="1" data-am-selected="{btnWidth: '100%'}">
                            @foreach($genders as $gender)
                                <option value="{{$gender}}" @if($talent->gender == $gender) selected @endif>{{$gender}}</option>
                                <!-- <option value="未知">未知</option> -->
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="nationality" class="am-u-sm-2 am-form-label">国籍:</label>
                        <div class="am-u-sm-4">
                            <select id="nationality" name="nationality" minlength="1" data-am-selected="{btnWidth: '100%'}">
                                @foreach($countries as $country)
                                <option value="{{ $country }}" @if($country == $talent->nationality) selected @endif>{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="nation" class="am-u-sm-2 am-form-label">民族:</label>
                        <div class="am-u-sm-4">
                            <select id="nation" name="nation" minlength="1" data-am-selected="{btnWidth: '100%'}">
                                @foreach($nations as $nation)
                                <option value="{{ $nation }}" @if($nation == $talent->nation) selected @endif>{{ $nation }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="birth" class="am-u-sm-2 am-form-label">出生年月:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="birth" name="birth" pattern="\d{4}-\d{2}" data-am-datepicker="{format: 'yyyy-mm', viewMode: 'months', minViewMode: 'months'}" placeholder="出生年月" value="{{ $talent->birth }}" />
                        </div>
                        <label for="marital" class="am-u-sm-2 am-form-label">婚姻状况:</label>
                        <div class="am-u-sm-4">
                            <select id="marital" name="marital" data-am-selected="{btnWidth: '100%'}">
                            @foreach($maritals as $marital)
                                <option value="{{$marital}}" @if($marital == $talent->marital) selected @endif>未婚</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="birthAddress" class="am-u-sm-2 am-form-label">籍贯:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="birthAddress" name="birthAddress" maxlength="100" placeholder="籍贯" value="{{ $talent->birthAddress }}" />
                        </div>
                        <label for="registeredAddress" class="am-u-sm-2 am-form-label">户口所在地:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="registeredAddress" name="registeredAddress" maxlength="100" placeholder="户口所在地" value="{{ $talent->registeredAddress }}" />
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="politicsStatus" class="am-u-sm-2 am-form-label">政治面貌:</label>
                        <div class="am-u-sm-4">
                            <select id="politicsStatus" name="politicsStatus" data-am-selected="{btnWidth: '100%'}">
                            @foreach($politics as $politic)
                                <option value="{{ $politic }}" @if($politics == $talent->politicsStatus) selected @endif>{{$politic}}</option>
                            @endforeach
                            </select>
                        </div>
                        <label for="degree" class="am-u-sm-2 am-form-label">最高学历:</label>
                        <div class="am-u-sm-4">
                            <select id="degree" name="degree" data-am-selected="{btnWidth: '100%'}">
                            @foreach($degrees as $degree)
                                <option value="{{ $degree }}" @if($talent->degree == $degree) selected @endif>{{ $degree }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="professionalTitle" class="am-u-sm-2 am-form-label">职称:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="professionalTitle" name="professionalTitle" maxlength="50" placeholder="职称" value="{{ $talent->professionalTitle }}" />
                        </div>
                        <label for="workYear" class="am-u-sm-2 am-form-label">工作经验:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="workYear" name="workYear" pattern="\d" placeholder="工作经验" value="{{ $talent->workYear }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="telephone" class="am-u-sm-2 am-form-label">联系电话:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="telephone" name="telephone" maxlength="20" placeholder="联系电话" value="{{ $talent->telephone }}" />
                        </div>
                        <label for="mobile" class="am-u-sm-2 am-form-label">手机号码:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="mobile" name="mobile" maxlength="20" placeholder="手机号码" value="{{ $talent->mobile }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="email" class="am-u-sm-2 am-form-label">电子邮箱:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="email" name="email" placeholder="电子邮箱" value="{{ $talent->email }}" />
                        </div>
                        <label for="address" class="am-u-sm-2 am-form-label">联系地址:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="address" name="address" maxlength="100" placeholder="联系地址" value="{{ $talent->address }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="school1" class="am-u-sm-2 am-form-label">毕业学校1:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="school1" name="school1" maxlength="50" placeholder="毕业学校1" value="{{ $talent->school1 }}" />
                        </div>
                        <label for="major1" class="am-u-sm-2 am-form-label">毕业专业1:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="major1" name="major1" maxlength="50" placeholder="毕业专业1" value="{{ $talent->major1 }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="school2" class="am-u-sm-2 am-form-label">毕业学校2:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="school2" name="school2" maxlength="50" placeholder="毕业学校1" value="{{ $talent->school2 }}" />
                        </div>
                        <label for="major2" class="am-u-sm-2 am-form-label">毕业专业2:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="major2" name="major2" maxlength="50" placeholder="毕业专业1" value="{{ $talent->major2 }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="school3" class="am-u-sm-2 am-form-label">毕业学校3:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="school3" name="school3" maxlength="50" placeholder="毕业学校1" value="{{ $talent->school3 }}" />
                        </div>
                        <label for="major3" class="am-u-sm-2 am-form-label">毕业专业3:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="major3" name="major3" maxlength="50" placeholder="毕业专业1" value="{{ $talent->major3 }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="returnee" class="am-u-sm-2 am-form-label">是否海归:</label>
                        <div class="am-u-sm-4">
                            <select id="returnee" name="returnee" minlength="1" data-am-selected="{btnWidth: '100%'}">
                                <option value="否" @if($talent->returnee == '否') selected @endif>否</option>
                                <option value="是" @if($talent->returnee == '是') selected @endif>是</option>
                            </select>
                        </div>
                        <label for="foreignOffice" class="am-u-sm-2 am-form-label">归国前单位:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="foreignOffice" name="foreignOffice" maxlength="100" placeholder="归国前单位" value="{{ $talent->foreignOffice }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="office" class="am-u-sm-2 am-form-label">用人单位/创办企业:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office" name="office" maxlength="100" placeholder="用人单位/创办企业" value="{{ $talent->office }}" />
                        </div>
                        <label for="position" class="am-u-sm-2 am-form-label">职务:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="position" name="position" maxlength="50" placeholder="职务" value="{{ $talent->position }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="category" class="am-u-sm-2 am-form-label">人才分类:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="category" name="category" required maxlength="20" placeholder="人才分类" value="{{ $talent->category }}" />
                        </div>
                        <label for="type" class="am-u-sm-2 am-form-label">人才类型:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="type" name="type" required maxlength="20" placeholder="人才类型" value="{{ $talent->type }}" />
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(count($experiences))
        @for($i = 0; $i < count($experiences); $i++)
        <div class="am-panel am-panel-default duplicatable" data-id="{{$i + 1}}" data-table="experience">
            <div class="am-panel-hd">
                <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-experience{{$i + 1}}'}">
                    <span class="am-text-primary info-title">经历信息{{$i + 1}}</span>
                    <span class="am-fr">
                        <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                        <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                    </span>
                </h4>
            </div>
            <div id="collapse-experience{{$i + 1}}" class="am-panel-collapse am-collapse">
                <div class="am-panel-bd">
                    <form id="talent-experience" class="am-form am-form-horizontal talent-form" data-am-validator>
                        <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="{{$experiences[$i]->id}}" />
                        <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                        <div class="am-form-group">
                            <label for="experience_type" class="am-u-sm-2 am-form-label">经历类型:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="experience_type" name="type" required maxlength="20" placeholder="经历类型" value="{{$experiences[$i]->type}}" />
                            </div>
                            <label for="experience_office" class="am-u-sm-2 am-form-label">单位:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="experience_office" name="office" required maxlength="100" placeholder="单位" value="{{$experiences[$i]->office}}" />
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="experience_start" class="am-u-sm-2 am-form-label">开始时间:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="experience_start" name="start" required pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="开始时间" value="{{$experiences[$i]->start}}" />
                            </div>
                            <label for="experience_end" class="am-u-sm-2 am-form-label">结束时间:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="experience_end" name="end" required pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="结束时间" value="{{$experiences[$i]->end}}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="experience_content" class="am-u-sm-2 am-form-label">内容:</label>
                            <div class="am-u-sm-10">
                                <textarea rows="10" id="experience_content" name="content" placeholder="内容">{{$experiences[$i]->content}}</textarea>
                            </div>
                        </div>   

                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-offset-2">
                                <button type="submit" class="am-btn am-btn-primary">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endfor
    @else
    <div class="am-panel am-panel-default duplicatable" data-id="1" data-table="experience">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-experience'}">
                <span class="am-text-primary info-title">经历信息</span>
                <span class="am-fr">
                    <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                    <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                </span>
            </h4>
        </div>
        <div id="collapse-experience" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form id="talent-experience" class="am-form am-form-horizontal talent-form" data-am-validator>
                    <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="" />
                    <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                    <div class="am-form-group">
                        <label for="experience_type" class="am-u-sm-2 am-form-label">经历类型:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="experience_type" name="type" required maxlength="20" placeholder="经历类型">
                        </div>
                        <label for="experience_office" class="am-u-sm-2 am-form-label">单位:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="experience_office" name="office" required maxlength="100" placeholder="单位">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="experience_start" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="experience_start" name="start" required pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="开始时间">
                        </div>
                        <label for="experience_end" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="experience_end" name="end" required pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="结束时间">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="experience_content" class="am-u-sm-2 am-form-label">内容:</label>
                        <div class="am-u-sm-10">
                            <textarea rows="10" id="experience_content" name="content" placeholder="内容"></textarea>
                        </div>
                    </div>   

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if(count($evaluations))
        @for($i = 0; $i < count($evaluations); $i++)
        <div class="am-panel am-panel-default duplicatable" data-id="{{$i + 1}}" data-table="evaluation">
            <div class="am-panel-hd">
                <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-evaluation{{$i + 1}}'}">
                    <span class="am-text-primary info-title">评定信息{{ $i+1 }}</span>
                    <span class="am-fr">
                        <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                        <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                    </span>
                </h4>
            </div>
            <div id="collapse-evaluation{{$i+1}}" class="am-panel-collapse am-collapse">
                <div class="am-panel-bd">
                    <form id="talent-evaluation" class="am-form am-form-horizontal talent-form" data-am-validator>
                        <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="{{ $evaluations[$i]->id }}" />
                        <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                        <div class="am-form-group">
                            <label for="evaluation_date" class="am-u-sm-2 am-form-label">评定年月:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="evaluation_date" name="date" required pattern="\d{4}-\d{2}" data-am-datepicker="{format: 'yyyy-mm', viewMode: 'months', minViewMode: 'months'}" placeholder="评定年月" value="{{ $evaluations[$i]->date }}" />
                            </div>
                            <label for="evaluation_batch" class="am-u-sm-2 am-form-label">批次:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="evaluation_batch" name="batch" maxlength="50" placeholder="批次" value="{{ $evaluations[$i]->batch }}" />
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="evaluation_category" class="am-u-sm-2 am-form-label">人才分类:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="evaluation_category" name="category" maxlength="50" placeholder="人才分类" value="{{ $evaluations[$i]->category }}" />
                            </div>
                            <label for="evaluation_type" class="am-u-sm-2 am-form-label">人才类型:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="evaluation_type" name="type" maxlength="50" placeholder="人才类型" value="{{ $evaluations[$i]->type }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="evaluation_result" class="am-u-sm-2 am-form-label">评定结果:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="evaluation_result" name="result" required maxlength="100" placeholder="评定结果" value="{{ $evaluations[$i]->result }}" />
                            </div>
                            <div class="am-u-sm-6">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-offset-2">
                                <button type="submit" class="am-btn am-btn-primary">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endfor
     @else
    <div class="am-panel am-panel-default duplicatable" data-id="1" data-table="evaluation">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-evaluation'}">
                <span class="am-text-primary info-title">评定信息</span>
                <span class="am-fr">
                    <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                    <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                </span>
            </h4>
        </div>
        <div id="collapse-evaluation" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form id="talent-evaluation" class="am-form am-form-horizontal talent-form" data-am-validator>
                    <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="" />
                    <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                    <div class="am-form-group">
                        <label for="evaluation_date" class="am-u-sm-2 am-form-label">评定年月:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="evaluation_date" name="date" required pattern="\d{4}-\d{2}" data-am-datepicker="{format: 'yyyy-mm', viewMode: 'months', minViewMode: 'months'}" placeholder="评定年月">
                        </div>
                        <label for="evaluation_batch" class="am-u-sm-2 am-form-label">批次:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="evaluation_batch" name="batch" maxlength="50" placeholder="批次">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="evaluation_category" class="am-u-sm-2 am-form-label">人才分类:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="evaluation_category" name="category" maxlength="50" placeholder="人才分类">
                        </div>
                        <label for="evaluation_type" class="am-u-sm-2 am-form-label">人才类型:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="evaluation_type" name="type" maxlength="50" placeholder="人才类型">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="evaluation_result" class="am-u-sm-2 am-form-label">评定结果:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="evaluation_result" name="result" required maxlength="100" placeholder="评定结果">
                        </div>
                        <div class="am-u-sm-6">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if(count($projects))
        @for($i = 0; $i < count($projects); $i++)
        <div class="am-panel am-panel-default duplicatable" data-id="{{ $i+1 }}" data-table="project">
            <div class="am-panel-hd">
                <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-project{{ $i+1 }}'}">
                    <span class="am-text-primary info-title">项目信息{{ $i+1 }}</span>
                    <span class="am-fr">
                        <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                        <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                    </span>
                </h4>
            </div>
            <div id="collapse-project{{ $i+1 }}" class="am-panel-collapse am-collapse">
                <div class="am-panel-bd">
                    <form id="talent-project" class="am-form am-form-horizontal talent-form" data-am-validator>
                        <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="{{ $projects[$i]->id }}" />
                        <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                        <div class="am-form-group">
                            <label for="project_name" class="am-u-sm-2 am-form-label">项目名称:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="project_name" name="name" required maxlength="100" placeholder="项目名称" value="{{ $projects[$i]->name }}" />
                            </div>
                            <label for="project_desc" class="am-u-sm-2 am-form-label">项目情况:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="project_desc" name="desc" maxlength="1000" placeholder="项目情况" value="{{ $projects[$i]->desc }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="project_status" class="am-u-sm-2 am-form-label">项目状态:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="project_status" name="status" maxlength="20" placeholder="项目状态" value="{{ $projects[$i]->status }}" />
                            </div>
                            <label for="project_progress" class="am-u-sm-2 am-form-label">项目进程:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="project_progress" name="progress" maxlength="20" placeholder="项目进程" value="{{ $projects[$i]->progress }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="project_start" class="am-u-sm-2 am-form-label">开始时间:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="project_start" name="start" pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="开始时间" value="{{ $projects[$i]->start }}" />
                            </div>
                            <label for="project_end" class="am-u-sm-2 am-form-label">结束时间:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="project_end" name="end" pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="结束时间" value="{{ $projects[$i]->end }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-offset-2">
                                <button type="submit" class="am-btn am-btn-primary">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endfor
    @else
    <div class="am-panel am-panel-default duplicatable" data-id="1" data-table="project">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-project'}">
                <span class="am-text-primary info-title">项目信息</span>
                <span class="am-fr">
                    <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                    <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                </span>
            </h4>
        </div>
        <div id="collapse-project" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form id="talent-project" class="am-form am-form-horizontal talent-form" data-am-validator>
                    <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="" />
                    <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                    <div class="am-form-group">
                        <label for="project_name" class="am-u-sm-2 am-form-label">项目名称:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="project_name" name="name" required maxlength="100" placeholder="项目名称">
                        </div>
                        <label for="project_desc" class="am-u-sm-2 am-form-label">项目情况:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="project_desc" name="desc" maxlength="1000" placeholder="项目情况">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="project_status" class="am-u-sm-2 am-form-label">项目状态:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="project_status" name="status" maxlength="20" placeholder="项目状态">
                        </div>
                        <label for="project_progress" class="am-u-sm-2 am-form-label">项目进程:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="project_progress" name="progress" maxlength="20" placeholder="项目进程">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="project_start" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="project_start" name="start" pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="开始时间">
                        </div>
                        <label for="project_end" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="project_end" name="end" pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="结束时间">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if(count($offices))
        @for($i = 0; $i < count($offices); $i++)
        <div class="am-panel am-panel-default duplicatable" data-id="{{ $i + 1 }}" data-table="office">
            <div class="am-panel-hd">
                <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-office{{ $i + 1 }}'}">
                    <span class="am-text-primary info-title">工作单位信息{{ $i+1 }}</span>
                    <span class="am-fr">
                        <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                        <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                    </span>
                </h4>
            </div>
            <div id="collapse-office{{ $i + 1 }}" class="am-panel-collapse am-collapse">
                <div class="am-panel-bd">
                    <form id="talent-office" class="am-form am-form-horizontal talent-form" data-am-validator>
                        <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="{{ $offices[$i]->id }}" />
                        <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                        <div class="am-form-group">
                            <label for="office_office" class="am-u-sm-2 am-form-label">工作单位:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="office_office" name="office" required maxlength="50" placeholder="工作单位" value="{{ $offices[$i]->office }}" />
                            </div>
                            <label for="office_position" class="am-u-sm-2 am-form-label">职务:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="office_position" name="position" maxlength="50" placeholder="职务" value="{{ $offices[$i]->position }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="office_start" class="am-u-sm-2 am-form-label">开始时间:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="office_start" name="start" pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="开始时间" value="{{ $offices[$i]->start }}" />
                            </div>
                            <label for="office_end" class="am-u-sm-2 am-form-label">结束时间:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="office_end" name="end" pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="结束时间" value="{{ $offices[$i]->end }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-offset-2">
                                <button type="submit" class="am-btn am-btn-primary">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endfor
    @else
    <div class="am-panel am-panel-default duplicatable" data-id="1" data-table="office">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-office'}">
                <span class="am-text-primary info-title">工作单位信息</span>
                <span class="am-fr">
                    <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                    <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                </span>
            </h4>
        </div>
        <div id="collapse-office" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form id="talent-office" class="am-form am-form-horizontal talent-form" data-am-validator>
                    <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="" />
                    <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                    <div class="am-form-group">
                        <label for="office_office" class="am-u-sm-2 am-form-label">工作单位:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office_office" name="office" required maxlength="50" placeholder="工作单位">
                        </div>
                        <label for="office_position" class="am-u-sm-2 am-form-label">职务:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office_position" name="position" maxlength="50" placeholder="职务">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="office_start" class="am-u-sm-2 am-form-label">开始时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office_start" name="start" pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="开始时间">
                        </div>
                        <label for="office_end" class="am-u-sm-2 am-form-label">结束时间:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="office_end" name="end" pattern="\d{4}-\d{2}-\d{2}" data-am-datepicker="{format: 'yyyy-mm-dd'}" placeholder="结束时间">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif


    @if(count($relations))
        @for($i = 0; $i < count($relations); $i++)
        <div class="am-panel am-panel-default duplicatable" data-id="{{ $i + 1 }}" data-table="relation">
            <div class="am-panel-hd">
                <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-relation{{ $i + 1 }}'}">
                    <span class="am-text-primary info-title">联系人相关信息{{ $i+1 }}</span>
                    <span class="am-fr">
                        <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                        <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                    </span>
                </h4>
            </div>
            <div id="collapse-relation{{ $i + 1 }}" class="am-panel-collapse am-collapse">
                <div class="am-panel-bd">
                    <form id="talent-relation" class="am-form am-form-horizontal talent-form" data-am-validator>
                        <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="{{ $relations[$i]->id }}" />
                        <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                        <div class="am-form-group">
                            <label for="relation_relation" class="am-u-sm-2 am-form-label">联系人关系:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="relation_relation" name="relation" required maxlength="10" placeholder="联系人关系" value="{{ $relations[$i]->relation }}" />
                            </div>
                            <label for="relation_name" class="am-u-sm-2 am-form-label">联系人姓名:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="relation_name" name="name" required maxlength="20" placeholder="联系人姓名" value="{{ $relations[$i]->name }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="relation_office" class="am-u-sm-2 am-form-label">联系人单位:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="relation_office" name="office" maxlength="50" placeholder="联系人单位" value="{{ $relations[$i]->office }}" />
                            </div>
                            <label for="relation_position" class="am-u-sm-2 am-form-label">联系人职务:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="relation_position" name="position" maxlength="20" placeholder="联系人职务" value="{{ $relations[$i]->position }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="relation_mobile" class="am-u-sm-2 am-form-label">联系人手机号:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="relation_mobile" name="mobile" maxlength="20" placeholder="联系人手机号" value="{{ $relations[$i]->mobile }}" />
                            </div>
                            <label for="relation_qq" class="am-u-sm-2 am-form-label">联系人QQ:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="relation_qq" name="qq" maxlength="20" placeholder="联系人QQ" value="{{ $relations[$i]->qq }}" />
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="relation_office_phone" class="am-u-sm-2 am-form-label">联系人办公电话:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="relation_office_phone" name="office_phone" maxlength="20" placeholder="联系人办公电话" value="{{ $relations[$i]->office_phone }}" />
                            </div>
                            <label for="relation_office_fax" class="am-u-sm-2 am-form-label">联系人传真:</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="relation_office_fax" name="office_fax" maxlength="20" placeholder="联系人传真" value="{{ $relations[$i]->office_fax }}" />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="relation_email" class="am-u-sm-2 am-form-label">联系人E-mail:</label>
                            <div class="am-u-sm-4">
                                <input type="email" id="relation_email" name="email" maxlength="50" placeholder="联系人E-mail" value="{{ $relations[$i]->email }}" />
                            </div>
                            <div class="am-u-sm-6">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-offset-2">
                                <button type="submit" class="am-btn am-btn-primary">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endfor
    @else
    <div class="am-panel am-panel-default duplicatable" data-id="1" data-table="relation">
        <div class="am-panel-hd">
            <h4 class="am-panel-title" data-am-collapse="{parent: false, target: '#collapse-relation'}">
                <span class="am-text-primary info-title">联系人相关信息</span>
                <span class="am-fr">
                    <span class="am-text-danger am-icon-minus remove-item" title="删除一条"></span>
                    <span class="am-text-success am-icon-plus duplicate-item" title="增加一条"></span>
                </span>
            </h4>
        </div>
        <div id="collapse-relation" class="am-panel-collapse am-collapse">
            <div class="am-panel-bd">
                <form id="talent-relation" class="am-form am-form-horizontal talent-form" data-am-validator>
                    <input type="hidden" class="id" autocomplete="off" name="id" id="id" value="" />
                    <input type="hidden" class="tid" autocomplete="off" name="tid" id="tid" value="{{$talent->id}}" />
                    <div class="am-form-group">
                        <label for="relation_relation" class="am-u-sm-2 am-form-label">联系人关系:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation_relation" name="relation" required maxlength="10" placeholder="联系人关系">
                        </div>
                        <label for="relation_name" class="am-u-sm-2 am-form-label">联系人姓名:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation_name" name="name" required maxlength="20" placeholder="联系人姓名">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="relation_office" class="am-u-sm-2 am-form-label">联系人单位:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation_office" name="office" maxlength="50" placeholder="联系人单位">
                        </div>
                        <label for="relation_position" class="am-u-sm-2 am-form-label">联系人职务:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation_position" name="position" maxlength="20" placeholder="联系人职务">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="relation_mobile" class="am-u-sm-2 am-form-label">联系人手机号:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation_mobile" name="mobile" maxlength="20" placeholder="联系人手机号">
                        </div>
                        <label for="relation_qq" class="am-u-sm-2 am-form-label">联系人QQ:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation_qq" name="qq" maxlength="20" placeholder="联系人QQ">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="relation_office_phone" class="am-u-sm-2 am-form-label">联系人办公电话:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation_office_phone" name="office_phone" maxlength="20" placeholder="联系人办公电话">
                        </div>
                        <label for="relation_office_fax" class="am-u-sm-2 am-form-label">联系人传真:</label>
                        <div class="am-u-sm-4">
                            <input type="text" id="relation_office_fax" name="office_fax" maxlength="20" placeholder="联系人传真">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="relation_email" class="am-u-sm-2 am-form-label">联系人E-mail:</label>
                        <div class="am-u-sm-4">
                            <input type="email" id="relation_email" name="email" maxlength="50" placeholder="联系人E-mail">
                        </div>
                        <div class="am-u-sm-6">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-10 am-u-sm-offset-2">
                            <button type="submit" class="am-btn am-btn-primary">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@stop

@section('foot-assets')
<script type="text/javascript">
/* 非基本信息的多条目添加删除 start */
var handleDuplicate = function(e) {
    e.stopPropagation();
    var currentPanel = $(this).parents('.am-panel');
    var newPanel = currentPanel.clone(true, false);
    var table = newPanel.attr('data-table');
    var newDataId;
    var dataIds = [];
    $('.duplicatable.am-panel[data-table=' + table + ']').each(function(index, item) {
        dataIds.push($(item).attr('data-id'));
    });
    newDataId = Math.max.apply(null, dataIds) + 1;
    newPanel.attr('data-id', newDataId);

    var collapseTarget = 'collapse-' + table + newDataId;
    newPanel.find('.am-panel-title').attr('data-am-collapse', "{parent:false,target:'#" + collapseTarget +"'}");
    newPanel.find('.am-panel-collapse').attr('id', collapseTarget);
    newPanel.find('label').each(function(i, ele) {
        var labelFor = $(ele).attr('for');
        $(ele).attr('for', labelFor.replace(/\d+/, '') + newDataId);
    });
    newPanel.find('label + div > *').each(function(i, ele) {
        var id = $(ele).attr('id');
        $(ele).attr('id', id.replace(/\d+/, '') + newDataId);
        $(ele).val('');
    });
    var title = newPanel.find('.info-title');
    title.text(title.text().replace(/(\d*)$/, '') + newDataId);
    newPanel.find('.duplicate-item').click(function(e) {
        handleDuplicate.call(this, e);
    });
    newPanel.find('.remove-item').click(function(e) {
        handleRemove.call(this, e);
    });
    newPanel.find('.talent-form').validator(validator);
    newPanel.find('#id').val('');
    newPanel.find('[data-am-datepicker]').each(function() {
        var options = $(this).attr('data-am-datepicker');
        var options = eval('(' + options + ')');
        $(this).datepicker(options);
    });
    currentPanel.after(newPanel);
}

var handleRemove = function(e) {
    e.stopPropagation();
    $('#delete-confirm-modal').modal({
        relatedTarget: this,
        onConfirm: function() {
            var panel = $(this.relatedTarget).parents('.am-panel');
            var id = panel.find('#id').val();
            id ? deleteInfo(panel, id) : panel.remove();
        }, 
    });    
}

$('.duplicate-item').on('click', function(e) {
    handleDuplicate.call(this, e);
});

$('.remove-item').on('click', function(e) {
    handleRemove.call(this, e);
});


function deleteInfo(panel, id) {
    var table = panel.attr('data-table');
    $.ajax({
        url: '/admin/talent/info',
        type: 'DELETE',
        data: {
            table: table,
            id: id,
        },
        success: function() {
            panel.remove();
        },
        error: function() {
            alert('删除失败', 'danger');
        }
    });
}

/* 非基本信息的多条目添加删除 end */
</script>
@stop