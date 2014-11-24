<?php
	include_once "item_info.php";
	include 'phpQuery/phpQuery.php';
	header("Content-Type: text/html;charset = utf-8");
	function Transcoding($in_filename)
	{
	$out_filename = 'utf8.php';//utf8生成的文件路径
	$contents = file_get_contents($in_filename);
	$contents = iconv('GBK', 'UTF-8', $contents);
	file_put_contents($out_filename, $contents);
	return $out_filename;
	}
	
	$url = 'http://s.taobao.com/search?q='.$_POST["name"];
	echo $url;
	echo "<br/>";
	$url = iconv('UTF-8','GBK',$url);
	phpQuery::newDocumentFile(Transcoding($url));         //抓取网址
	$arr=pq(".item-box.st-itembox");
	$item_arry = array();
	foreach($arr as $li){
	$item_temp = new Item_class;
	$item_temp->item_name = pq($li)->find('h3.summary')->text();
	$item_temp->item_price = pq($li)->find('.col.price')->text();
	$item_temp->item_pic_src = pq($li)->find('img')->attr('data-ks-lazyload');
	$item_temp->item_src = pq($li)->find("a")->attr('href');
	$item_temp->item_source = "T";
	
	$item_arry[] = $item_temp;//添加商品到数组中
	}
	foreach($item_arry as $li)
	{
		echo $li->show();
		echo "<br/>";
	}
	echo "<script>location.href='index.php';</script>";
?>
