 <?php
	header("Content-Type: text/html;charset = utf-8");
	include "init.php";
	session_start();
	$conn=mysqli_connect("localhost","test","123456","bs") or die("数据库服务器连接错误：".mysql_error());
?>
<?php
	header("Content-Type: text/html;charset = utf-8");
	$item_info = trim($_POST[info]);
	//echo $item_info;
	//echo "<br/>";
	$k = strpos($item_info,'!');
	$item_name = substr($item_info, 0,$k);//product name 
	$item_src = substr($item_info,$k+1,strlen($item_info)-$k-1);//product lianjie

	$uid=$_SESSION['uid'];
	
	$check_query=mysqli_query($conn,"select * from record where rname ='$item_name' limit 1");
	$row = $check_query->fetch_array(MYSQL_ASSOC);
	
    
   if($row['uid'] == $uid){
		echo '该物品',$item_name,'已经被收藏';
		exit;
    }
	$date = time();
	echo $date;
    $sql="insert record (rname,rsrc,uid,regdate)values('$item_name','$item_src',$uid,$date)";
    echo $sql;
	if(mysqli_query($conn,$sql)){
		exit('您收藏成功。进入<a href="./PersonalCenter.php">个人中心</a>查看');
	}
	else{
		echo '抱歉，数据库添加错误：',mysqli_error($conn),'<br/>';
	}

	

?>
