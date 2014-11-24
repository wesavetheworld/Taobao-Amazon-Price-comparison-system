
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="title" content="老和山比价网">
<meta name="description" content="老和山比价网！发现最低价！">
<meta name="keywords" content="老和山,比价,浙江大学">
<title>老和山比价网</title>

<!-- Le styles -->
<link href="css/bootstrap-combined.min.css" rel="stylesheet">
<link href="css/layoutit.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/flat-ui.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->

	<!-- Fav and touch icons -->
	<link rel="shortcut icon" href="img/favicon.png">
	
	<script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="js/jquery.htmlClean.js"></script>


<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body >

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1 class="text-info text-left">
				老和山比价网
			</h1>
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container-fluid">
						<a class="btn btn-navbar" data-target=".navbar-responsive-collapse"></a>
					
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								<li>
									<a href="#">主页</a>
								</li>
								<li>
									<a href="#2">帮助</a>
								</li>
								<li>
									<a href="#1">联系我们</a>
								</li>
							</ul>
							<ul class="nav pull-right">
								
								
								<li class="dropdown">
									<?php 
											session_start();
											if(!isset($_SESSION['username'])){
												echo "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"PersonalCenter.php\">登陆/注册</a>";
												echo "<ul class=\"dropdown-menu\">";

												echo  "<li>";
													echo "<a href=\"login.html\">登陆</a>";
												echo "</li>";
												echo "<li>";
													echo "<a href=\"reg.html\">注册</a>";
												echo "</li>";}
												else
												{
												echo "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"PersonalCenter.php\">用户管理</a>";
												echo "<ul class=\"dropdown-menu\">";

												echo "<li>";
													echo "<a href=\"PersonalCenter.php\"target = \"_blank\">个人中心</a>";
												echo "</li>";	
												
												echo  "<li>";
													echo "<a href=\"login.php?action=1\">注销登录</a>";
												echo "</li>";

												
												}

									?>
									</ul>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
				
			</div>
			<p>
				<kbd>
					商品名称：
				</kbd>
			</p>
			<form class="form-search" action = "result.php" method = "post" >
				<input class="input-medium search-query" name="name" type="text" /><button class="btn" type="submit">搜索</button>
			</form>
			<div class="carousel slide" id="carousel-920920">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-920920">
					</li>
					<li data-slide-to="1" data-target="#carousel-920920">
					</li>
					<li data-slide-to="2" data-target="#carousel-920920">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="" src="img/1.jpg" />
						<div class="carousel-caption">
							<h4>
								Amazon 和 淘宝
							</h4>
							<p>
								亚马逊和淘宝是著名的两家在线商品交易网站，商品种类多，日流量非常大。
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/2.jpg" />
						<div class="carousel-caption">
							<h4>
								亚 && 淘
							</h4>
							<p>
								找到最低价！
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/3.jpg" />
						<div class="carousel-caption">
							<h4>
								马云
							</h4>
							<p>
								阿里总裁，中国网络界的叱咤风流人物。
							</p>
						</div>
					</div>
				</div> <a data-slide="prev" href="#carousel-920920" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-920920" class="right carousel-control">›</a>
			</div>
			<div class="hero-unit">
				<a name = '2'></a>
				<h1>
					Welcome！
				</h1>
				<p>
					老和山比价网是一家专业的亚马逊和淘宝网购物比价系统
				</p>
				<p>
					买到就是赚到哟，亲~
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">参看更多 »</a>
				</p>
			</div>
		</div>
	</div>
	<div class="row-fluid" >
		<div class="span8"  >
			<a name = '1'></a>
			 <address><strong>Zju, Edu.</strong></address>
			<div>
				王刚 3110104862
			</div>
			<div>
				(+86)-152-6701-9394
			</div>
			<div>
				628 room , Building 32<br /> Hang Zhou yq campus
			</div>
		</div>
		<div class="span4">
			<img alt="140x140" src="img/a.jpg" />
		</div>
	</div>
</div>

</body>
</html>
