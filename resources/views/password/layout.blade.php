<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/amazeui.min.css" />
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/jquery/jquery.min.js"></script>
    <!--[if lte IE 9]>
    <p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a> 以获得更好的体验！</p>
    <![endif]-->
</head>

<body>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd am-g">
            <div class="am-u-sm-4">
                <a class="am-text-default" href="/">
                    <span class="am-icon am-icon-home"> Home</span>
                </a>
            </div>
            <div class="am-u-sm-4 am-u-end am-text-center">@yield('title')</div>
        </div>
        <div class="am-panel-bd">
            @yield('body')
        </div>
    </div>
</body>

</html>
