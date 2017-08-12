<html>
<body>
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
$page_string='第一页|<a href=page.php?page='.($page+1).'>下一页</a>|';
elseif(($page==$page_count)||($page_count==0))
$page_string='<a href=page.php?page='.($page-1).'>上一页</a>|<a href=page.php?page='.$page_count.'>尾页</a>';
elseif(($page>1)&&($page<$page_count))
$page_string='<a href=page.php?page='.($page-1).'>上一页</a>|<a href=page.php?page='.($page+1).'>下一页</a>|';


//获取数据
$a=($page-1)*$page_size;
$b=$page_size;
$query_s="select * from shouye order by number limit $a,$b";
$result_s=$db->query($query_s);
$result_s_array=array();
while($rows=$result_s->fetch_array()){
array_push($result_s_array,$rows);
}
?>
<table>
<?php 

	 
	$i=0; foreach($result_s_array as $rows):$i++;?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $rows['number'];?></td>  
		<td><?php echo $rows['shuname'];?></td>
		<td><?php echo $rows['publishing'];?></td>  
		<td><?php echo $rows['editor'];?></td>
		<td><?php echo $rows['donatepeople'];?></td>
		<td><a  href="#">详情</a></td>
	</tr>
	<?php endforeach;$i++;?>
</table>
<?php
echo '当前为第'.$page.'页&nbsp;';
echo $page_string;
echo '一共有'.$page_count.'页';
?>
</body>
</html>