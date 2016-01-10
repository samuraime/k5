<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>海创园人才管理 - @yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/amazeui.min.css" />
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/jquery/jquery.min.js"></script>
    @yield('head-assets')
</head>

<body>
    <!--[if lte IE 9]>
    <p class="browsehappy">你正在使用<strong>过时</strong>的浏览器。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a> 以获得更好的体验！</p>
    <![endif]-->
    <header class="am-topbar admin-header">
        <div class="am-topbar-brand">
            <a href="/"><strong>海创园人才管理</strong></a>
            <a href="/admin"><small>后台管理</small></a>
        </div>
        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
            <span class="am-sr-only">导航切换</span>
            <span class="am-icon-fw am-icon-bars"></span>
        </button>
        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                <li class="am-header-information"> 欢迎您登录</li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        <span class="am-icon-user"> {{ Session::get('account.name') }}</span>
                        <span class="am-icon-fw am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li>
                            <a onclick="$('#profile-modal').modal('open')">
                                <span class="am-icon-fw am-icon-user"></span> 个人资料</a>
                        </li>
                        <li>
                            <a onclick="$('#password-modal').modal('open')">
                                <span class="am-icon-fw am-icon-cog"></span> 修改密码</a>
                        </li>
                        <li>
                            <a href="/auth/logout">
                                <span class="am-icon-fw am-icon-power-off"></span> 退出登录</a>
                        </li>
                    </ul>
                </li>
                <li class="am-hide-sm-only">
                    <a href="javascript:;" id="admin-fullscreen">
                        <span class="am-icon-fw am-icon-arrows-alt"></span>
                        <span class="admin-fullText">开启全屏</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div class="w1200 mt20">
        <div class="am-cf admin-main">
            <!-- sidebar start -->
            <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
                <div class="am-offcanvas-bar admin-offcanvas-bar">
                    <ul class="am-list admin-sidebar-list">
                        @if (in_array('summary', Session::get('account.permission')))
                        <li>
                            <a class="am-cf" href="/admin/summary">
                                <span class="am-icon-fw am-icon-area-chart"></span> 数据汇总
                                <span class="am-fr am-margin-right"></span>
                            </a>
                        </li>
                        @endif @if (in_array('talent', Session::get('account.permission')))
                        <li>
                            <a href="/admin/talent">
                                <span class="am-icon-fw am-icon-file"></span> 人才信息</a>
                        </li>
                        @endif @if (in_array('enterprise', Session::get('account.permission')))
                        <li>
                            <a href="/admin/enterprise" class="am-cf">
                                <span class="am-icon-fw am-icon-check am-icon-fw am-icon-file-text"></span> 企业信息</a>
                        </li>
                        @endif @if (in_array('log', Session::get('account.permission')))
                        <li>
                            <a href="/admin/log">
                                <span class="am-icon-fw am-icon-calendar"></span> 访问日志</a>
                        </li>
                        @endif @if (in_array('message', Session::get('account.permission')))
                        <li>
                            <a href="/admin/message">
                                <span class="am-icon-fw am-icon-pencil-square-o"></span> 留言记录</a>
                        </li>
                        @endif @if (in_array('article', Session::get('account.permission')) || in_array('billboard', Session::get('account.permission')) || in_array('account', Session::get('account.permission')))
                        <li class="#">
                            <a data-am-collapse="{target: '#collapse-nav'}">
                                <span class="am-icon-fw am-icon-puzzle-piece"></span> 系统管理
                                <span class="am-icon-fw am-icon-angle-right am-fr am-margin-right"></span>
                            </a>
                            <ul class="am-list am-collapse admin-sidebar-sub{{ preg_match('/\/admin\/(article)|(account)|(billboard)/', $_SERVER['REQUEST_URI']) ? ' am-in' : '' }}" id="collapse-nav">
                                @if (in_array('article', Session::get('account.permission')))
                                <li>
                                    <a href="/admin/article">
                                        <span class="am-icon-fw am-icon-list-alt"></span> 前台文章</a>
                                </li>
                                @endif @if (in_array('billboard', Session::get('account.permission')))
                                <li>
                                    <a href="/admin/billboard">
                                        <span class="am-icon-fw am-icon-calendar-o"></span> 公告管理</a>
                                </li>
                                @endif @if (in_array('account', Session::get('account.permission')))
                                <li>
                                    <a href="/admin/account">
                                        <span class="am-icon-fw am-icon-table"></span> 账号管理</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                    @if ($globalBillboard)
                        <div class="am-panel am-panel-default admin-sidebar-panel">
                            <div class="am-panel-bd">
                                <p><span class="am-icon-fw am-icon-bookmark"></span> 公告</p>
                                <p>{{ $globalBillboard->content }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- sidebar end -->
            <!-- content start -->
            <div class="admin-content">
                <div class="am-cf am-padding border-bottom">
                    <div class="am-fl am-cf">
                        <strong class="am-text-primary am-text-lg">@yield('nav-primary')</strong>
                        /
                        <small>@yield('nav-secondary')</small>
                    </div>
                </div>
                @yield('content')
            </div>
            <!-- content end -->
        </div>
    </div>
    <!-- 自定义的alert start -->
    <div class="am-modal am-modal-alert" tabindex="-1" id="alert-modal">
        <div class="am-modal-dialog">
            <div class="am-modal-hd"></div>
            <div class="am-modal-bd"></div>
            <div class="am-modal-footer">
                <span class="am-modal-btn">确定</span>
            </div>
        </div>
    </div>
    <!-- 自定义alert end -->
    <!-- 个人信息 start -->
    <div class="am-modal am-modal-no-btn" tabindex="-1" id="profile-modal">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">个人资料
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd">
                <form id="user-profile-form" class="am-form am-form-horizontal" data-am-validator>
                    <div class="am-form-group">
                        <label for="user-mobile" class="am-u-sm-3 am-form-label">电话</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="user-mobile" required pattern="^\d+$" placeholder="电话" value="{{Session::get('account.mobile')}}" />
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">电子邮箱</label>
                        <div class="am-u-sm-9">
                            <input type="email" id="user-email" required class="js-pattern-email" placeholder="电子邮箱" value="{{Session::get('account.email')}}" />
                        </div>
                    </div>
                    <div class="am-form-group">
                        <div class="am-u-sm-3 am-u-sm-offset-3">
                            <input type="submit" class="am-btn am-btn-primary" value="提交修改" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 个人信息 end -->
    <!-- 密码 start -->
    <div class="am-modal am-modal-no-btn" tabindex="-1" id="password-modal">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">修改密码
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd">
                <form id="user-password-form" class="am-form am-form-horizontal" data-am-validator>
                    <div class="am-form-group">
                        <label for="user-old-password" class="am-u-sm-3 am-form-label">旧密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" required pattern="^\S{6,20}$" id="user-old-password" placeholder="旧密码">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-password" class="am-u-sm-3 am-form-label">新密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" required pattern="^\S{6,20}$" id="user-password" placeholder="新密码">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-password-confirmation" class="am-u-sm-3 am-form-label">确认密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" required pattern="^\S{6,20}$" id="user-password-confirmation" data-equal-to="#user-password" placeholder="确认密码">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <div class="am-u-sm-3 am-u-sm-offset-3">
                            <input type="submit" class="am-btn am-btn-primary" value="提交修改" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 密码 end -->
    <!-- 操作成功刷新 start -->
    <div class="am-modal am-modal-no-btn" tabindex="-1" id="refresh-modal">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">
                <span>操作成功</span>
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd">
            </div>
        </div>
    </div>
    <!-- 操作成功刷新 end -->
    <script type="text/javascript">
    $(function() {
        $('#user-profile-form').validator({
            submit: function() {
                if (this.isFormValid()) {
                    $.ajax({
                        url: '/admin/session/profile',
                        method: 'PUT',
                        data: {
                            nickname: $('#user-nickname').val(),
                            email: $('#user-email').val(),
                            mobile: $('#user-mobile').val(),
                        },
                        success: function(data) {
                            $('#profile-modal').modal('close');
                            alert('修改成功', 'success');
                            $('#alert-modal').on('closed.modal.amui', function() {
                                window.location.reload();
                            });
                        },
                        error: function() {
                            $('#profile-modal').modal('close');
                            alert('遇到了什么错误, 请稍后再试', 'danger');
                        }
                    });
                }

                return false;
            }
        });
        $('#user-password-form').validator({
            // validate: function(validity) {
            //     if ($(validity.field).is('#user-old-password')) {
            //         var password = $('#user-old-password').val();

            //         if (/^\S{6,20}$/.test(password)) {
            //             return $.ajax({
            //                 method: 'POST',
            //                 url: '/admin/session/check-password',
            //                 data: {
            //                     password: password,
            //                 },
            //             }).then(function() {
            //                 validity.valid = true;
            //                 return validity;
            //             }, function() {
            //                 validity.valid = false;
            //                 return validity;
            //             });
            //         } else {
            //             validity.valid = false;
            //             return validity;
            //         }
            //     }
            // },
            submit: function() {
                var validity = this.isFormValid();
                $.when(validity).then(function() {
                    $.ajax({
                        url: '/admin/session/password',
                        method: 'PUT',
                        data: {
                            oldPassword: $('#user-old-password').val(),
                            password: $('#user-password').val(),
                            password_confirmation: $('#user-password-confirmation').val(),
                        },
                        success: function(data) {
                            $('#password-modal').modal('close');
                            alert('修改成功', 'success');
                            $('#alert-modal').on('closed.modal.amui', function() {
                                window.location.reload();
                            });
                        },
                        error: function() {
                            $('#password-modal').modal('close');
                            alert('修改失败, 请确认原密码是否正确', 'danger');
                        }
                    });
                }, function() {
                    return false;
                });
                return false;
            }
        });
    });
    </script>
    @include('admin.delete-confirm-modal')
    <script src="/js/amazeui/amazeui.min.js"></script>
    <script src="/js/app.js"></script>
    @yield('foot-assets')
</body>

</html>
