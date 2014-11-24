<?php
	include_once "item_info.php";
	include 'phpQuery/phpQuery.php';
	header("Content-Type: text/html;charset = utf-8");
	function getAmazon($query_name)	//query_name 为查询商品名
	{
	if($query_name != "")
	{
		$page_index = 1;
		$query_index = 0;
		$query_condition = "result_";
		$url = "http://www.amazon.cn/s/&page=".(string)$page_index."&keywords=".$query_name;
		phpQuery::newDocumentFile($url);         
		$page_count = intval(pq(".pagnDisabled")->text());
		//echo $page_count;
		$item_arry = array();
		if($page_count > 4)
		{
			for(;$page_index <= 4;$page_index ++)
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
		foreach($item_arry as $li)
		{
			$li->show();
		}
	}
	}
	getAmazon("包子");
	//echo "<script>location.href='index.php';</script>";	
?>
