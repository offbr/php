<?php 
	session_start();
	unset($_SESSION['m_email']); //해당 세션만 해제;
	session_destroy();//모든 세션 파괴;
	header('Location:../mypageindex.php');
?>