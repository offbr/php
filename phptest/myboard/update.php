<?php
// 데이터 베이스 연결하기
include "db_info.php";

// 글의 비밀번호 가져오기

$id = $_GET['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$title = $_POST['title'];
$content = $_POST['content'];
$query = "select pass from board where id= $id";
$pass = $_POST['pass'];
$result = mysql_query ( $query, $conn );
$row = mysql_fetch_array ( $result );

// 입력된 값과 비교한다.
if ($pass == $row ['pass']) { // 비밀번호가 일치하는경우
	$query = "update board set name ='$name', email='$email', title='$title', content='$content' 
			  where id =$id";
	$result = mysql_query ( $query, $conn );
} else {
	echo ("
			<script>
			alert('비밀번호가 틀립니다.');
			history.go(-1);
			</script>
			");
	exit ();
}
// 데이터 베이스와 연결 종료
mysql_close ( $conn );

// 수정하기인 경우 수정된 글로..
echo ("<meta http-equiv='Refresh' content='1; URL=read.php?id=$id'>");
?>
<font size=2>정상적으로 수정되었습니다.</font>
