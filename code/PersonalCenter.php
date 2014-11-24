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


<?php include 'init.php'?>

<body >

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1 class="text-success">
				用户中心
			</h1>
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container-fluid">
						<a class="btn btn-navbar" data-target=".navbar-responsive-collapse" data-toggle="collapse"></a>
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<a class="btn btn-navbar" data-target=".navbar-responsive-collapse" data-toggle="collapse"></a><a class="btn btn-navbar" data-target=".navbar-responsive-collapse" data-toggle="collapse"></a>
							<ul class="nav">
								<li>
									<a href="index.php">首页</a>
								</li>
								<li>
									<a href="#1">联系我们</a>
								</li>
								<li>
									<a href="#1">帮助</a>
								</li>
							</ul>
							<ul class="nav pull-right">
								
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">个人中心</a>
									<ul class="dropdown-menu">
										<li>
											<a href="login.php?action=1">注销</a>
										</li>
										<li>
											<a href="index.php">返回首页</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
				
			</div>
			
			<p class="text-info">
				欢迎您，<?php echo $_SESSION['username'];?>!
			</p>
			<div class="accordion" id="accordion-413497">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle collapsed" data-parent="#accordion-413497" data-toggle="collapse" href="#accordion-element-554968">个人信息</a>
					</div>
					<div class="accordion-body collapse" id="accordion-element-554968">
						<div class="accordion-inner">
							<?php
								//用来显示登陆用户的个人信息
								$conn=mysqli_connect("localhost","test","123456","bs") or die("数据库服务器连接错误：".mysql_error());
								$uid = $_SESSION['uid'];
								$check_query=mysqli_query($conn,"select * from user where uid='$uid' limit 1");
									if($result = mysqli_fetch_array($check_query))
									{
										
									 echo "注册日期：";
									 echo $result['regdate'];
									 echo "<br/>";
									}else{
									  exit('登录失败,用户不存在~<a href="javascript:history.back(-1);">返回</a>重试');
									}
							?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-body collapse" id="accordion-element-393252">
						<div class="accordion-inner">
						</div>
					</div>
				</div>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>
							编号
						</th>
						<th>
							商品名
						</th>
						<th>
							收藏时间
						</th>
						<th>
							购买链接
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$conn=mysqli_connect("localhost","test","123456","bs") or die("数据库服务器连接错误：".mysqli_error());
					$shoucang_query=mysqli_query($conn,"select * from record where uid=$uid");					
					$count = 1;
					while($row = mysqli_fetch_array($shoucang_query, MYSQLI_ASSOC)){
					//while ($row = $showcang_query->fetch_array(MYSQLI_ASSOC)) {
							print("<tr class=\"info\">");
								echo "<td>";
									echo $count;
								echo "</td>";
								echo "<td>";
									echo $row['rname'];
								echo "/td>";
								echo "<td>";
									echo $row['regdate'];
								echo "</td>";
								echo "<td>";
									printf("<a href = \"%s\" target = \"_blank\">详情",$row['rsrc']);
								print("</td>");
							print("</tr>");
							$count ++;
							}
					?>					
				</tbody>
			</table><hr />
			
		</div>
	</div>
</div>

</body>
</html>
