<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海创人才 @yield('title')</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/amazeui.min.css" />
    <link rel="stylesheet" href="/css/admin.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="/js/jquery/jquery.min.js"></script>
    <script src="/js/amazeui/amazeui.min.js"></script>
    <script src="/js/app.js"></script>
</head>
<body>
    <!--[if lte IE 9]>
    <p class="browsehappy">你正在使用<strong>过时</strong>的浏览器。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a> 以获得更好的体验！</p>
    <![endif]-->
    <header class="am-topbar admin-header">
        <div class="am-topbar-brand">
            <a href="/"><strong>海创园人才管理</strong></a>
        </div>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list" >
                @if (Session::get('account'))
                <li class="am-dropdown"><a class="am-text-primary" href="/admin">管理后台</a></li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        <span class="am-icon-user"> {{ Session::get('account.name') }}</span>
                        <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li>
                            <a href="/auth/logout">
                                <span class="am-icon-power-off"></span> 退出登录</a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="am-dropdown"><a href="/message"><span class="am-icon-pencil-square-o"></span> 留言</a></li>
                <li class="am-dropdown" id="list"><a class="am-dropdown-toggle login-bitton" data-am-modal="{target: '#login-modal'}"><span class="am-icon-user"></span> 管理员登录</a></li>
                @endif
            </ul>
        </div>

        <div class="am-modal am-modal-no-btn" tabindex="-1" id="login-modal">
            <div class="am-modal-dialog">
                <div class="am-modal-hd">
                    登录
                    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
                    <hr/>
                </div>
                <div class="am-modal-bd">
                    <form id="login-form" class="am-form am-form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <div class="am-form-group">
                            <label for="name" class="am-u-sm-3 am-form-label">登录名</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="name" name="name" required pattern="^\S+" placeholder="登录名"/>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="password" class="am-u-sm-3 am-form-label">密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" id="password" pattern="^\S{6,20}$" name="password" required autocomplete="off" placeholder="密码"/>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-4 am-u-sm-offset-8">
                                <a href="/password/find">忘记密码?</a>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-3 am-u-sm-offset-3">
                                <input type="submit" class="am-btn am-btn-primary" value="提交登录" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(function() {
            // $('#captcha-img').click(function() {
            //  this.src += '?' + Date.now();
            // });

            $('#login-form').validator({
                validate: function(validity) {
                    if ($(validity.field).is('#password')) {
                        var name = $('#name').val();
                        var password = $('#password').val();

                        if (/^\w+$/.test(name) && /^\S{6,20}$/.test(password)) {
                            return $.ajax({
                                method: 'POST',
                                url: '/auth/login',
                                data: {
                                    name: name,
                                    password: password,
                                },
                            }).then(function() {
                                validity.valid = true;
                                return validity;
                            }, function() {
                                validity.valid = false;
                                return validity;
                            });
                        } else {
                            validity.valid = false;
                            return validity;
                        }
                    }
                },
                submit: function() {
                    var validity = this.isFormValid();
                    $.when(validity).then(function() {
                        window.location.reload();
                    }, function() {
                        return false;
                    });
                    return false;
                }
            });
        })
        </script>
    </header>

    <div class="am-g">
        <div class="am-u-lg-10 am-u-md-8 am-u-sm-centered am-background-color mt20 am-padding border-bottom">
        @yield('content')
        </div>
    </div>
</body>
</html>
