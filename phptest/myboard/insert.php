<?php
	//데이터 베이스 연결
	include "db_info.php";
	
	$query = "insert into board
			(id, name, email, pass, title, content, wdate, ip, view) 
			values('','$_POST[name]','$_POST[email]','$_POST[pass]','$_POST[title]','$_POST[content]',now(),'$_SERVER[REMOTE_ADDR]',0)";
	$result = mysql_query($query, $conn);//성공여부는 result 변수에 저장된다. 
	//데이터베이스와의 연결 종료
	mysql_close($conn);
	
	// 새 글 쓰기인 경우 리스트로...
	echo ("<meta http-equiv='Refresh' content ='1; URL=list.php'>");
	//1초후에 list.php로 이동
?>
	<h3>정상적으로 저장되었습니다. </h3>