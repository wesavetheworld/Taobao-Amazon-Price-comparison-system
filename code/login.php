<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<?php
session_start();

$conn=mysqli_connect("localhost","test","123456","bs") or die("数据库服务器连接错误：".mysql_error());
//注销登录
if(isset($_GET['action']))
{
  unset($_SESSION['uid']);
  unset($_SESSION['username']);
  session_destroy();
  echo '已成功注销登录，<a href="index.php">点此返回主页</a><br/>';
  echo '两秒后页面将自动跳转到首页，如若没有跳转，请点击上文中的链接！';
  $url = "index.php";
  Header("Refresh:2;url = $url");
  exit;
}
//登陆
if(!isset($_POST['submit'])){exit('访问不成功');}
$username=htmlspecialchars($_POST['username']);
$password=MD5($_POST['password']);
//包含数据库连接文件
//include('conn.php');
//检测用户名及密码是否正确
$check_query=mysqli_query($conn,"select uid from user where username='$username' limit 1");
if($result = mysqli_fetch_array($check_query))
{
    //登陆成功
  $_SESSION['username']=$username;
  $_SESSION['uid']=$result['uid'];
  //echo $_SESSION['uid'];
  $check_pass=mysqli_query($conn,"select password from user where username='$username' limit 1");
  $res = mysqli_fetch_array($check_pass);
  if(!array_diff(array($res['password']),array($password)))
    {echo'用户名和密码正确';echo '<br \>';}
  else
    {echo '密码错误<a href="javascript:history.back(-1);">返回</a>重新输入'; exit;}
	
	echo $username,'欢迎进入<a href="PersonalCenter.php">用户中心</a></br>';
	echo "两秒后自动进入，如若没有进入用户中心请单击上行链接";
	$url = "PersonalCenter.php";
	Header("Refresh:2;url = $url");
  exit;
}else{
  exit('登录失败,用户不存在~<a href="javascript:history.back(-1);">返回</a>重试');
}
?>