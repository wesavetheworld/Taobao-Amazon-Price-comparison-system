<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<?php
if(!isset($_POST['submit'])){exit('非法访问！');}
$username = $_POST['username'];
$password = $_POST['password'];

if(strlen($password)<6)
{
	exit('错误：密码长度不符合规定，必须不少于6位，请重新设置！<br/><a href="javascript:history.back(-1);">返回</a>');
}

$conn=mysqli_connect("localhost","test","123456","bs") or die("数据库服务器连接错误：".mysql_error());

$check_query=mysqli_query($conn,"select uid from user where username='$username' limit 1");
if(mysqli_fetch_array($check_query)){
	echo '错误：用户名',$username,'已存在<a href="javascript:history.back(-1);">返回</a>';
		exit;
}
//向数据库中存入注册信息
$password= MD5($password);//对密码进行MD5加密
$regdate = time();
//$sql="INSERT INTO user(username,password,email,regdate)VALUES('$username','$password','$email',$regdate)";

$sql="insert user (username,password,regdate)values('$username','$password',$regdate)";

if(mysqli_query($conn,$sql)){exit('注册成功!。<a href="login.html">点此登陆</a>');}
else{
	echo '添加失败，请重试！',mysqli_error($conn),'<br/>';
	echo '<a href="javascript:history.back(-1);">点此重试</a>';
}
?>

