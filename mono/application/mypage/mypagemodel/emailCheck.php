<?php 

include("../../config/dbconfig.php");

?>

<? 
$m_email = $_GET['email'];

$sql = "SELECT * from member where m_email = '$m_email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(is_null($row['m_email'])){
?>
사용 가능한 이메일입니다
<a href ="#" onclick = "opener.document.register.inputEmail.focus(); window.close();">사용하기</a>
<?	
}else{
?>
이미 사용중인 이메일입니다.
<a href ="#" onclick = "opener.document.register.inputEmail.value=''; window.close();">재입력</a>
<?	
}
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
mysqli_close($conn);
?>