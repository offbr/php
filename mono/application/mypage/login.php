
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<!-- signin.css 부트스트랩을 cdn으로 가져왔으므로 정렬css 직접추가 -->
<style type="text/css">
.form-signin {
max-width: 330px;
padding: 15px;
margin: 0 auto;
}
</style>

</head>
<div class="container">
<body>
<!-- header -->
<? include("../header.php") ?>
<!-- //header -->
<br><br>


<!-- 로그인 폼 -->
<div class="container">

	<form class="form-signin" action="mypagemodel/loginOk.php" method="post">
		<h2 class="form-signin-heading">Please sign in</h2>
		
		<label for="inputEmail" class="sr-only">Email address</label> 
		<input type="text" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		
		<label for="inputPassword" class="sr-only">Password</label> 
		<input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
		
		<br>
		<button class="btn btn-lg btn-default btn-block" type="submit">Signin</button><br>
		
		<div class="container">
			<a href="register.php" class="text-sm" style="color: #949494;">Register</a> /
			<a href="#" class="text-sm" style="color: #949494;">Forget Password</a>
		</div>
	</form>
	
</div>
<!-- //로그인폼 -->


<br><br>
<!-- footer -->
<? include("../footer.php") ?>
<!-- //footer -->
</body>
</div>
</html>