<?php

$db=new mysqli('localhost','root','','tushu');

$sql="select count(*) as amount from shouye";
$result=$db->query($sql);
mysqli_set_charset($db,'utf8');
//获取总数据量
$row=$result->fetch_array();
$amount=$row['amount'];

//获取当前页数
if(isset($_GET['page']))
{
$page=intval($_GET['page']);
}
else
{
$page=1;}
//每页数量
$page_size=10;
//计算总共有多少页
if($amount<$page_size)
{
$page_count=1;}
if($amount%$page_size){//拿总数据除以每页的总数，如果有余数，那么总页数等于商+1
$page_count=(int)($amount/$page_size)+1;}
else{
$page_count=(int)($amount/$page_size);}

//翻页链接
$page_string='';
if ($page==1)
$page_string='第一页|<a href=index.php?page='.($page+1).'>下一页</a>|';
elseif(($page==$page_count)||($page_count==0))
$page_string='<a href=index.php?page='.($page-1).'>上一页</a>|<a href=index.php?page='.$page_count.'>尾页</a>';
elseif(($page>1)&&($page<$page_count))
$page_string='<a href=index.php?page='.($page-1).'>上一页</a>|<a href=index.php?page='.($page+1).'>下一页</a>|';


//获取数据
$a=($page-1)*$page_size;
$b=$page_size;
$query_s="select * from shouye order by number limit $a,$b";
$result_s=$db->query($query_s);

if($result_s && $result_s->num_rows>0){
	while($row=$result_s->fetch_assoc()){
		$rows[]=$row;
	}
}
?>
<html>
<head>
<meta charset="utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>工B206移动图书馆首页</title>

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
body{
	
	text-align:center;
}
</style>

</head>
<body style="background-color:#FFF; width:680px ;height:1024px;margin:0 auto">
		
		
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
	<li><a href="#" class="a">首页&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>
	
</ul>
</div>

<div style=" width:680px;height:50px;">

<a width="680px;"><?php include("booksortimg.php");?></a>
</div>
<div id="footan" class="footan">
<form action="editUser.php?act=index" method='post'>
	
   <table border="1px" cellspacing="0" cellpadding="4" width="680px">
	 <tr>
	
    <td>图书编号</td>
    <td>图书名称</td>  
    <td>出版社</td>
    <td>作者</td>  
    <td>捐赠人</td>
	<td>详情</td>

	</tr>

	<?php $i=1; foreach($rows as $row):?>
	<tr>
		
		<td><?php echo $row['number'];?></td>  
		<td><?php echo $row['shuname'];?></td>
		<td><?php echo $row['publishing'];?></td>  
		<td><?php echo $row['editor'];?></td>
		<td><?php echo $row['donatepeople'];?></td>
		<td><a  href="editUser.php?id=<?php echo $row['id'];?>">详情</a>|<a href="doAction.php?act=delUser&id=<?php echo $row['id'];?>">删除</a></td>
	</tr>
	<?php endforeach;$i++;?>

</table>
 
</form>	
</div>
<div id="footer" class="footer" >
<ul >
<?php
	echo '当前为第&nbsp;&nbsp;&nbsp;'.$page.'&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;&nbsp;';
	echo $page_string;
	echo '&nbsp;&nbsp;&nbsp;一共有&nbsp;&nbsp;&nbsp;'.$page_count.'&nbsp;&nbsp;&nbsp;页';
	?>
</ul>
</div>

</body>
</html>