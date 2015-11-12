<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>人才交流中心</title>
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
			<a href="/"><strong>人才交流中心</strong></a>
		</div>

		<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

		<div class="am-collapse am-topbar-collapse" id="topbar-collapse">

			<ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list" >
				@if (Session::get('account'))
				<li class="am-dropdown"><a href="/admin">管理后台</a></li>
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
					<form class="am-form am-form-horizontal" data-am-validator role="form" method="POST" action="{{ url('/auth/login') }}">
						<div class="am-form-group">
							<label for="name" class="am-u-sm-3 am-form-label">登录名</label>
							<div class="am-u-sm-9">
								<input type="text" id="name" name="name" required pattern="^\S+" placeholder="登录名"/>
							</div>
						</div>
						<div class="am-form-group">
							<label for="password" class="am-u-sm-3 am-form-label">密码</label>
							<div class="am-u-sm-9">
								<input type="password" id="password" pattern="^\S{6,20}$" name="password" required placeholder="密码"/>
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
	</header>

	<div class="am-g">
		<div class="am-u-lg-10 am-u-md-8 am-u-sm-centered am-background-color mt20 am-padding border-bottom">
			<div class="am-center-header">
				<h3 class="am-text-primary am-text-lg">{{ $article['title'] }}</h3>
				<code>时间: {{ $article['updated_at'] }}</code>
				<hr>
			</div>
			<!--存放客户文章内容 -->
			<div>
				{{ $article['content'] }}
			</div>
			<!--存放客户文章内容 -->
		</div>
	</div>

	<!-- Scripts -->
	<script src="/js/jquery/jquery.min.js"></script>
	<!--<![endif]-->
	<script src="/js/amazeui/amazeui.min.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>
