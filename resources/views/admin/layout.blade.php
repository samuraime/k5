<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>K5 - @yield('title')</title>
    <meta name="description" content="这是一个form页面">
    <meta name="keywords" content="form">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/css/amazeui.min.css" />
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/ajax.js"></script>
    <!--[if lte IE 9]>
    <p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a> 以获得更好的体验！</p>
    <![endif]-->
</head>

<body>
    <header class="am-topbar admin-header">
        <div class="am-topbar-brand">
            <strong>公司名称</strong>
            <small>后台管理模板</small>
        </div>
        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
            <span class="am-sr-only">导航切换</span>
            <span class="am-icon-bars"></span>
        </button>
        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                <li class="am-header-information am-text-secondary"> 欢迎您登录</li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        <span class="am-icon-users"></span> {{ Session::get('user.name') }}
                        <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li>
                            <a href="/admin/account/profile">
                                <span class="am-icon-user"></span> 个人资料</a>
                        </li>
                        <li>
                            <a href="/admin/account/password">
                                <span class="am-icon-cog"></span> 修改密码</a>
                        </li>
                        <li>
                            <a href="/auth/logout">
                                <span class="am-icon-power-off"></span> 退出登录</a>
                        </li>
                    </ul>
                </li>
                <li class="am-hide-sm-only">
                    <a href="javascript:;" id="admin-fullscreen">
                        <span class="am-icon-arrows-alt"></span>
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
                        <li>
                            <a class="am-cf" href="/admin/summary">
                                <span class="am-icon-area-chart"></span> 数据列表
                                <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/enterprise" class="am-cf">
                                <span class="am-icon-check am-icon-file-text"></span> 企业列表</a>
                        </li>
                        <li>
                            <a href="/admin/personnel">
                                <span class="am-icon-file"></span> 人才列表</a>
                        </li>
                        </li>
                        <li class="admin-parent">
                            <a data-am-collapse="{target: '#collapse-nav1'}">
                                <span class="am-icon-calendar"></span> 日志记录
                                <span class="am-icon-angle-right am-fr am-margin-right"></span>
                            </a>
                            <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav1">
                                <li>
                                    <a href="/admin/log/visit">
                                        <span class="am-icon-table"></span> 回访记录</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/message">
                                <span class="am-icon-pencil-square-o"></span> 留言板管理</a>
                        </li>
                        <li class="#">
                            <a data-am-collapse="{target: '#collapse-nav2'}">
                                <span class="am-icon-puzzle-piece"></span> 系统管理
                                <span class="am-icon-angle-right am-fr am-margin-right"></span>
                            </a>
                            <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav2">
                                <li>
                                    <a href="/admin/manage/article">
                                        <span class="am-icon-list-alt"></span> 前台文章</a>
                                </li>
                                <li>
                                    <a href="/admin/manage/user">
                                        <span class="am-icon-table"></span> 账号管理</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="am-panel am-panel-default admin-sidebar-panel">
                        <div class="am-panel-bd">
                            <p>
                                <span class="am-icon-bookmark"></span> 公告</p>
                            <p>时光静好，与君语；细水流年，与君同。</p>
                        </div>
                    </div>
                    <div class="am-panel am-panel-default admin-sidebar-panel">
                        <div class="am-panel-bd">
                            <p>
                                <span class="am-icon-tag"></span> wiki</p>
                            <p>Welcome to the Amaze UI wiki!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar end -->
            <!-- content start -->
            <div class="admin-content">
              @yield('content')
            </div>
            <!-- content end -->
        </div>
    </div>



  <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">Amaze UI</div>
    <div class="am-modal-bd">
      确定删除吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="/js/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="/js/amazeui.min.js"></script>
    <script src="/js/app.js"></script>
    <script>
    $(function() {
      $('.delebutton').on('click', function(e) {
        e.preventDefault();
        var $confirm = $('#my-confirm');
        var confirm = $confirm.data('am.modal');
        var onConfirm = function() {
            alert('你确定删除 ');
          };
        var onCancel = function() {
            alert('你不想删除 ');
          }

        if (confirm) {
          confirm.options.onConfirm =  onConfirm;
          confirm.options.onCancel =  onCancel;
          confirm.toggle(this);
        } else {
          $confirm.modal({
            relatedElement: this,
            onConfirm: onConfirm,
            onCancel: onCancel
          });
        }
      });
    });
  </script>
</body>

</html>