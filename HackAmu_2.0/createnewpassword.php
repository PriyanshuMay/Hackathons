<?php
include("essentials/database.php");
?>
<!DOCTYPE html>
<html>
	<link href="forum.css" rel="stylesheet" type="text/css">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="GNDEC GATE FORUM">
		<meta name="keywords" content="gate,priyanshumay,gne,gndec,">
		<meta name="author" content="PriyanshuMay,priyanshumay">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Retrive Your Password</title>
	</head>
	<body background="img/back.jpg">

	<?php
	$selector = $_GET["selector"];
	$validator = $_GET["validator"];
	 if(empty($selector) || empty($validator)){
	 	echo 'could not validate your request';
	 } else {
      if (ctype_xdigit($selector) ! == false && ctype_xdigit($validator) ! == false) {
      	?>
      
    <form action="resetpassword.php" method="post"> 
	<input type="hidden" name="selector" value="<?php echo $selector ?>" >
	<input type="hidden" name="validator" value="<?php echo $validator ?>" >
	<input type="password" name="pwd" placeholder="Enter a new password">
	<input type="password" name="pwd-repeat" placeholder="Confirm new password">
	




    </form>








      }
	 }









	?>









		<div class="signinbox" style="position: absolute; top:12%; right:40%;">
			<br>
			<center><img class="logocircle" src="img/user.png"  title="logo" width="210px" height="200px" border="1" /></center><br><br>
			<center>
			<table>
				<form action="resetpassword.php" name="passform" method="POST"f>
					<tr><th>
					<input class="login_text_box"  type="text" name="email" placeholder="Enter email" required></th></tr>
				</table><br><br>
				<tr><th><b><button class="submit2" name="reset-password-submit" type="submit">Reset Password</button></b></th></tr><br><br>
			</form></center>
			<?php
			if (isset($_GET["reset"])) {
			if ($_GET["reset"] == "success"){
				echo '<p>please check  your e-mail account</p>';
										}
			}
			?><br><br>
		</div>
	</body>
</html>