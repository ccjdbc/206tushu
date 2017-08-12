<?php
   
	$mysqli=new mysqli('localhost','root','','tushu');
			if($mysqli->connect_errno){
			die($mysqli->connect_error);
		}
		$mysqli->set_charset('utf8');
		$id=$_GET['id'];
		$sql="SELECT * FROM shouye WHERE id=".$id;
		$mysqli_result=$mysqli->query($sql);

		if($mysqli_result){
			$row=$mysqli_result->fetch_assoc();
			
		}

?>
		
	<html>
	<head>
		<title>图书编辑页面</title>
		<meta charset="utf-8">
		
		<!--css文件-->
		<style type="text/css">
		
		 td { 
		width:340px; 
		height: 30px;
		} 
		
	</style>

	</head>
	<body style="background-color:#FFF; width:680px; height:1680px; margin:0 auto">
		<div style="height:200px; text-align:center; margin:0 auto;">
		<a><img src="../images/head.jpg"/></a>
		</div>
		
		<!--图书编辑页面-->

	<form action="../php/doAction.php?act=editUser&id=<?php echo $id;?>" method='post'>
	<table border="1" align="center" bordercolor="#6666FF" width="680" cellspacing="0" cellpadding="0">
		
		<tr >
			<td  align="center">*图书编码</td>
			<td><input name="number" type="text" style="height:40px ;border:0px" value="<?php echo $row['number'];?>"></td>
		</tr>
		<tr >
			<td align="center">*图书名称</td>
			<td><input name="shuname" type="text" style="height:40px;border:0px" value="<?php echo $row['shuname'];?>"></td>
		</tr>
		<tr >
			<td align="center">*出版社</td>
			<td><input name="publishing" type="text" style="height:40px;border:0px" value="<?php echo $row['publishing'];?>"></td>
		</tr>
		<tr >
			<td align="center">*作者</td>
			<td><input name="editor" type="text" style="height:40px; border:0px" value="<?php echo $row['editor'];?>"></td>
		</tr>
		<tr >
			<td align="center">*捐赠人姓名</td>
			<td><input name="donatepeople" type="text" style="height:40px; border:0px" value="<?php echo $row['donatepeople'];?>" ></td>
		</tr>
		
		<tr >
			<td align="center">*捐赠时间</td>
			<td><input name="donatepeople" type="text" style="height:40px; border:0px" value="<?php echo $row['donatetime'];?>" ></td>
		</tr>
		
		<tr >
			<td align="center" style="height:40px" size="45"colspan="2">
			<input  type="submit" value="修改">
			<input  type="button" value="返回"><a href="index.php"></a></td>
	
		</tr>
	</table>
	</body>
	</html>