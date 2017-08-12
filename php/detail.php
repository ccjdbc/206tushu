
<?php 

$mysqli=new mysqli('localhost','root','','tushu');
if($mysqli->connect_errno){
	die($mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$id=$_GET['id'];
$sql="SELECT id,shunumber,donatepeople,donatetime FROM shouye WHERE id=".$id;
$mysqli_result=$mysqli->query($sql);
if($mysqli_result && $mysqli_result>0){
	$row=$mysqli_result->fetch_assoc();
}

?>


<html>
<head>
<meta charset="utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>工B206移动图书馆详情页面</title>

<!-- 首页页面的css格式代码-->

<style type="text/css">
li{display:inline-block; 
   float:right;
   margin-top:10px;
   }
 a:link{ 
 text-decoration:none;
 color:#FF0000;
 }
 a:hover { 
color:#000; 
text-decoration:none; 
} 

</style>

</head>
<body style="background-color:#FFF; width:680px ;height:1680px;margin:0 auto">
		
		
<div style="height:200px; text-align:center; margin:0 auto;">
<a><?php include("headimg.php");?></a>

</div>
<div style="background-color:#09F;height:40px; margin-top:-17px;" >
<ul >

<!--当前时间-->
<a><li style="float:left"><?php 
  date_default_timezone_set('Asia/Shanghai');
echo date("y-m-d h:i",time()); ?></li></a>
	<li><a href="../html/addshu.html" class="a">图书捐赠&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
	<li><a href="#" class="a">系统设置&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>
	<li><a href="#" class="a">图书管理&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>
	<li><a href="#" class="a">读者管理&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>
	<li><a href="index.php" class="a">首页&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>
	
</ul>
</div>

<div style=" width:680px;height:50px;">

<a width="680px;"><?php include("booksortimg.php");?></a>
</div>
<div id="footan" class="footan">

<form action="doAction.php?act=detail&id=<?php echo $id;?>" method='post'>
   <table border="1px" cellspacing="0" cellpadding="4" width="320px">
  	
		<tr>
		<td>图片</td>
		<td><img style="margin:10px; padding:10px; width:40px;height:60px" src="../images/2.gif" /></td>
		</tr>
		
	
		<tr>
		<td>图书名称</td>  
		<td><input type="text" name="shuname" id="" value="<?php echo $row['shuname'];?>" /></td>
		</tr>
	
		<tr>
		<td>图书编号</td> 
		<td><input type="text" name="shunumber" id="" value="<?php echo $row['shunumber'];?>" /></td>
		</tr>
		
	   <tr>
       <td>捐赠人</td>
	   <td><input type="text" name="donatepeople" id="" value="<?php echo $row['donatepeople'];?>" /></td>
	   </tr>
	   
	   <tr>
	   <td>捐赠时间</td>
	  <td><input type="text" name="donatetime" id="" value="<?php echo $row['donatetime'];?>" /></td>
	   </tr>
	  
</table>
</form>
</div>
<div id="footer" class="footer">
<a>尾页</a>
</div>
</body>
</html>