<?php 

include("../../config/dbconfig.php");

?>

<? 

$m_email = $_POST['inputEmail'];
$m_name = $_POST['inputName'];
$m_pass = $_POST['inputPassword'];
$m_tel = $_POST['inputTel'];
$m_postcode = $_POST['postcode'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$m_address = $address1. " " .$address2;


//쿼리 전송
$query = "INSERT INTO `member` (`m_email`, `m_name`, `m_pass`, `m_postcode`, `m_address`, `m_tel`) 
			VALUES('$m_email', '$m_name', '$m_pass', '$m_postcode', '$m_address', '$m_tel')";
$result = mysqli_query($conn, $query);

if($result == true) {
	header("Location:../login.php");
}
else {
?>
	<script>
	alert("회원등록 실패했습니다");
	history.back();
	</script>
<?
}
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
mysqli_close($conn);
?>



