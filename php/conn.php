<html>
	<head>
		<meta charset="utf-8">
		<title>建立数据连接</title>
	</head>
<body>
<?php
	$conn = mysqli_connect("localhost","root","","tushu") or die("无法建立连接！");
	 mysqli_set_charset($conn,'utf8');
	
?>
</body>
</html>