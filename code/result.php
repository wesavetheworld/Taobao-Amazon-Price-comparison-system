<?php
	header("Content-Type: text/html;charset = utf-8");
	include_once "item.class.php";
	include_once "phpQuery/phpQuery.php";
	
	
?>
<?php
	function Transcoding($in_filename)
	{
		$out_filename = 'utf8.php';//淘宝网编码格式进行转换
		$contents = file_get_contents($in_filename);
		$contents = iconv('GBK', 'UTF-8', $contents);
		file_put_contents($out_filename, $contents);
		return $out_filename;
	}
	//echo $_POST["name"];
	function getTaobao()
	{
		$item_arry = array();
		if(isset($_POST["name"]))
		{
		$url = 'http://s.taobao.com/search?q='.$_POST["name"];
		echo "<br/>";
		$url = iconv('UTF-8','GBK',$url);
		phpQuery::newDocumentFile(Transcoding($url));         //抓取网址
		$arr=pq(".item-box.st-itembox");
		
		$count = 0;
		foreach($arr as $li){
		$item_temp = new Item_class;
		$item_temp->item_name = pq($li)->find('h3.summary')->text();
		$item_temp->item_price = " ".pq($li)->find('.col.price')->text();
		$item_temp->item_pic_src = pq($li)->find('img')->attr('data-ks-lazyload');
		$item_temp->item_src = pq($li)->find("a")->attr('href');
		$item_temp->item_source = "T";
		
		$item_arry[] = $item_temp;//添加商品到数组中
		$count ++;
		if($count > 24)//爬取商品数量
			break;
		}
		/*
		$url = 'http://s.taobao.com/search?q='.$_POST["name"].'&s=44'; //抓取第二页的内容
		echo "<br/>";
		$url = iconv('UTF-8','GBK',$url);
		phpQuery::newDocumentFile(Transcoding($url));         //抓取网址
		$arr=pq(".item-box.st-itembox");
		foreach($arr as $li){
			$item_temp = new Item_class;
			$item_temp->item_name = pq($li)->find('h3.summary')->text();
			$item_temp->item_price = " ".pq($li)->find('.col.price')->text();
			$item_temp->item_pic_src = pq($li)->find('img')->attr('data-ks-lazyload');
			$item_temp->item_src = pq($li)->find("a")->attr('href');
			$item_temp->item_source = "T";
			
			$item_arry[] = $item_temp;//添加商品到数组中
		} */
		}
	return $item_arry;
}
	function getAmazon()
	{
		$item_arry = array();
		if(isset($_POST['name']))
		{
		//echo $_POST["name"];
		$query_name = $_POST['name'];
		$page_index = 1;
		$query_index = 0;
		$query_condition = "result_";
		$url = "http://www.amazon.cn/s/&page=".(string)$page_index."&keywords=".$query_name;
		phpQuery::newDocumentFile($url);         
		$page_count = intval(pq(".pagnDisabled")->text());
		
		if($page_count > 2)
		{
			for(;$page_index <= 2;$page_index ++)
			{
				$url = "http://www.amazon.cn/s/&page=".$page_index."&keywords=".$query_name;
				phpQuery::newDocumentFile($url);
				$result_page = pq("#resultsCol");
				for($temp = 0; $temp < 24; $temp ++)
				{
				$item_temp = new Item_class;
				$temp_id_name = "#".$query_condition.(string)$query_index;
				$item_all_info = pq($result_page)->find($temp_id_name);
				
				$item_temp->item_name = pq($item_all_info)->find('h3')->text();
				$item_temp->item_price = pq($item_all_info)->find('.bld.lrg.red')->text();
				$item_temp->item_pic_src = pq($item_all_info)->find('img')->attr('src');
				$item_temp->item_src = pq($item_all_info)->find('h3')->find('a')->attr('href');
				$item_temp->item_source = "A";
				$item_arry[] = $item_temp;//添加商品到数组中
				$query_index ++;
				}
			}
		}
		else
		{
			for(;$page_index <= $page_count - 1;$page_index ++)
			{
				$url = "http://www.amazon.cn/s/&page=".$page_index."&keywords=".$query_name;
				phpQuery::newDocumentFile($url);
				$result_page = pq("#resultsCol");
				for($temp = 0; $temp < 24; $temp ++)
				{
				$item_temp = new Item_class;
				$temp_id_name = "#".$query_condition.(string)$query_index;
				$item_all_info = pq($result_page)->find($temp_id_name);
				
				$item_temp->item_name = pq($item_all_info)->find('h3')->text();
				$item_temp->item_price = pq($item_all_info)->find('.bld.lrg.red')->text();
				$item_temp->item_pic_src = pq($item_all_info)->find('img')->attr('src');
				$item_temp->item_src = pq($item_all_info)->find('h3')->find('a')->attr('href');
				$item_temp->item_source = "A";
				$item_arry[] = $item_temp;//添加商品到数组中
				$query_index ++;
				}
			
			}
		}
		}
	return $item_arry;
	}
?>

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
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
<link href="css/responsive.css" type="text/css" rel="stylesheet" />
 <link href="css/prettyPhoto.css" type="text/css" rel="stylesheet" />
        <!-- END: css -->
        
        <!-- BEGIN: js -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type="text/javascript" src="js/google-code-prettify/prettify.js"></script> 
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
        <script type="text/javascript" src="js/bootstrap.js"></script> 

        <script type="text/javascript" src="js/hoverIntent.js"></script>  
        <script type="text/javascript" src="js/jquery.hoverdir.js"></script>

        <script type="text/javascript" src="js/jflickrfeed.min.js"></script>
        <script type="text/javascript" src="js/jquery.quicksand.js"></script>
        <script type="text/javascript" src="js/jquery.elastislide.js"></script> 
        <script type="text/javascript" src="js/jquery.tweet.js"></script> 
        <script type="text/javascript" src="js/main.js"></script> 

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
			<h1 class="text-info">
				老和山比价网
			</h1>
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container-fluid">
						<a class="btn btn-navbar" data-target=".navbar-responsive-collapse"></a>
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								<li>
									<a href="index.php">主页</a>
								</li>
								<li>
									<a href="#1">帮助</a>
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
													echo "<a href=\"PersonalCenter.php\" target = \"_blank\">个人中心</a>";
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
				
			</div><hr />
			<p>
				<kbd>
					商品名称：
				</kbd>
			</p>
			<form class="form-search" action = "result.php" method = "post">
				<input class="input-medium search-query" name="name" type="text" /><button class="btn" type="submit">搜索</button>
			</form>
			<hr /> 
			<?php
				echo "<form name=\"myform\" method=\"POST\" action=\"result.php\">";
				echo "<input value=\"".$_POST['name']."\" name=\"name\" style=\"width: 0px;\" >";
				echo "<input type = \"submit\" value=\"价格排序\" name=\"sort\" style=\"width: 100px;\" class = \"btn btn-large btn-primary\" >";
				echo "<input value=\"".$_POST['name']."\" name=\"name2\" style=\"width: 0px;\" >";
				echo "</form>";
				//echo "<button class="btn btn-large btn-primary" name = "sort" vaule = $_POST['name']action = "result.php" type="button">单击按价格排序</button><hr />";
			?>
		</div>
	</div>

	
	
<section id="container">
    <div class="container">
        
        <!--BEGIN: side divider-->
        <div class="div-left"></div>
        <div class="div-right"></div>
        <!--END: side divider-->
    
        <!--BEGIN: top filtrable-->
        <ul id="filtrable">
            <li class="1"><a href="#">1</a></li>
            <li class="2"><a href="#">2</a></li>
            <li class="3"><a href="#">3</a></li>
        </ul><!--END: top filtrable-->

        <div class="clear"></div>
        
        <section class="row da-thumbs portfolio filtrable clearfix">
         
<?php
	$result = array_merge(getTaobao(),getAmazon());

    if(isset($_POST["sort"]))
	   usort($result,array("Item_class","cmp"));
	$count=0;
	foreach($result as $li)
    {
            $count++;
			$li->show();
           
    }
?>
           
        </section>
                        
        <!--BEGIN: navigation-->
        <div id="navigation" class="no_top">
            <ul>
                <li><a href="#" class="current">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div><!--END: navigation-->
            
    </div>
</section><!-- END: container -->
	
	
	
	<div class="row-fluid">
		<div class="span12">
			<hr />
		</div>
	</div>
	
	
	
	<div class="row-fluid">
		<div class="span2">
		<a name = '1'></a>
			<img alt="140x140" src="img/a.jpg" />
		</div>
		<div class="span6">
		</div>
		<div class="span4">
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
	</div>
</div>

</body>
</html>
