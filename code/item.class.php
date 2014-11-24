<?php

/*
http://s.taobao.com/search?q=包子&s=88
88 = (p3-2)*44
http://www.amazon.cn/s/&page=2&keywords=包子
*/

class Item_class{
	public  $item_name;//商品名称；
	public  $item_price;//商品价格；
	public  $item_pic_src;//图片链接；
	public  $item_src;//购买链接；
	public  $item_source;//来源于淘宝或者亚马逊或者其它网站
/*	public function show()	//用来输出商品信息
	{
		print "<p><a href=\"".$this->item_src."\" target="."_blank".">
		<img src=\"".$this->item_pic_src."\"></a></p>";
		print "<h2>".$this->item_price."</h2>";
		print "<h3><a href=\"".$this->item_src."\" target="."_blank".">
		".$this->item_name."</a></h3>";
	}
*/
	static function cmp($a,$b)
	{
		if($a->item_price == $b->item_price)
			return 0;
			return $a->item_price > $b->item_price ? 1:-1;

	}
	/*
	public function show()	//用来输出商品信息
	{
		echo "<p><a href=".$this->item_src." target="."_blank".">
		<img src=\"".$this->item_pic_src."\"></a></p>";
		echo "<h2>".$this->item_price."</h2>";
		echo "<h3><a href=\"".$this->item_src."\" target="."_blank".">
		".$this->item_name."</a></h3>";
	}*/
	public function show()
	{
	echo "<span>";
	//echo "<button class=\"btn\" name = \"info\" vaule =\"".$this->item_name."!".$this->item_src."\" action = \"addRecord.php\" type=\"submit\">收藏</button>";
	echo "<form name=\"myform\" method=\"POST\" action=\"addRecord.php\" target = \"_blank\">";
	echo "<input type=\"image\" src=\"img/cart.png\" width=\"40\" height=\"40\" value=\"".$this->item_name."!".$this->item_src."\" name=\"info\" onclick=\"document.myform.submit()\">";
	echo "</form>";
		echo "<a href=".$this->item_src." target= \"_blank\">";
			echo "<img src = \"".$this->item_pic_src."\">";
			
		echo "</a>";
	echo "</span>";	
	echo "<h3><a href=".$this->item_src." target= \"_blank\">";
	if($this->item_source == "T")
		echo $this->item_price."  淘宝网";
	else
		echo $this->item_price."  亚马逊";

	echo "</a></h3>";
	echo "<p>".$this->item_name."</p>";
	echo "</article>";	
	}
	}
?>