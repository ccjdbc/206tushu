<?php

header('content-type:text/html;charset=utf-8');
//接收页面
$mysqli=new mysqli('localhost','root','','tushu');
if($mysqli->connect_errno){
	die($mysqli->connect_error);
}
$mysqli->set_charset('utf8');
    $number=$_POST['number'];
	$shuname=$_POST['shuname'];
	$publishing=$_POST['publishing']; 
	$editor=$_POST['editor'];
	$donatepeople=$_POST['donatepeople'];
	$donatetime=date("y-m-d",time());		
    $act=$_GET['act'];
    $id=$_GET['id'];
//根据不同操作完成不同功能
switch($act){
	case 'addshu':
	      $sql = "INSERT INTO shouye(number,shuname,publishing,editor,donatepeople,donatetime)VALUES('$number','$shuname','$publishing','$editor','$donatepeople','donatetime')";
	      $res=$mysqli->query($sql);
	 if($res){
			
			echo "<script type='text/javascript'>
					alert('恭喜你，捐书成功！');
					location.href='index.php';
					</script>";
			exit;
		}else{
			echo "<script type='text/javascript'>
			alert('图书编号重复，捐书失败，请重新填写！');
			location.href='../html/addshu.html';
			</script>";
			exit;
		}
		break;
	
	case 'delUser':
		//echo '删除记录'.$id;
		$sql="DELETE FROM shouye WHERE id=".$id;
		$res=$mysqli->query($sql);
		if($res){
			$mes='删除成功';
		}else{
			$mes='删除失败';
		}
		$url='index.php';
		echo "<script type='text/javascript'>
			alert('{$mes}');
			location.href='{$url}';
			</script>";
			exit;
		break;
		
		case 'editUser':
		$sql="UPDATE shouye SET shuname='{$shuname}',donatepeople='{$donatepeople}',shunumber='{$shunumber}' WHERE id=".$id;
		$res=$mysqli->query($sql);
		if($res){
			$mes='更新成功';
		}else{
			$mes='更新失败';
		}
		$url='index.php';
		echo "<script type='text/javascript'>
		alert('{$mes}');
		location.href='{$url}';
		</script>";
		exit;
		
		break;
	
}

?>