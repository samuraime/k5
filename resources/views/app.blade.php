<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="/css/amazeui.min.css" />
    <link rel="stylesheet" href="/css/admin.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong>公司名称</strong>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list" >
      <li class="am-dropdown" id="list"><a class="am-dropdown-toggle login-bitton" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 400, height: 355}"><span class="am-icon-users"></span> 登录</a></li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>

  <div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
   <div class="am-modal-dialog">
    <div class="am-modal-hd">
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">

 <form class="am-form " role="form" method="POST" action="{{ url('/auth/login') }}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>网站登录</legend>
  <div class="am-form-group am-text-left">
    <label for="doc-ipt-3" class="am-form-label" >电子邮件</label>
    <input type="email" id="doc-ipt-3" placeholder="输入你的电子邮件" name="email" value="{{ old('email') }}">
  </div>

  <div class="am-form-group am-text-left">
    <label for="doc-ipt-pwd-2" class="am-form-label" >密码</label>
      <input type="password" id="doc-ipt-pwd-2" placeholder="设置一个密码吧" name="password">
  </div>

  <div class="am-form-group am-text-left">
  <div class=" am-u-sm-7">
      <div class="checkbox">
        <label>
          <input type="checkbox"> 记住十万年
        </label>
      </div>
    </div>
    <div class=" am-u-sm-5">
    <a href="#">忘记密码?</a>
    </div>
  </div>

  <div class="am-form-group ">
      <div class="am-u-sm-12">
      <input type="submit" class="am-btn am-btn-default" value="提交登入"/>
    </div>
    </div>
  </div>
</fieldset>
</form>
    </div>
  </div>
</header>

<div class="am-g">
  <div class="am-u-lg-10 am-u-md-8 am-u-sm-centered am-background-color mt20 am-padding border-bottom">
    <div class="am-center-header">
    <h3 class="am-text-primary am-text-lg">墨菲定律是爱德华·墨菲（Edward A. Murphy）提出的</h3>
    <code>时间: 2015年05月07日</code>
    <hr>
    </div>
    <!--存放客户文章内容 -->
    <div>

    </div>
     <!--存放客户文章内容 -->
    </div>
</div>

	<!-- Scripts -->
	<script src="/js/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="/js/amazeui.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
