<?php 
	include("../../config/dbconfig.php");
?>

<?
$m_email = $_POST['inputEmail'];
$m_pass = $_POST['inputPassword'];

$sql = "SELECT * from member where m_email = '$m_email' and m_pass = '$m_pass'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); //mysqli_fetch_row($result) //row[0];

//비밀번호 틀릴 경우
if(is_null($row['m_pass'])){
?>
	<script>
	alert("아이디 및 비밀번호를 확인해주세요");
	location.href = "../mypageindex.php";
	</script>
<?
}else{
	session_start();
	$_SESSION['m_email'] = $m_email;
	header('Location:../mypageindex.php');
}
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
mysqli_close($conn);
?>