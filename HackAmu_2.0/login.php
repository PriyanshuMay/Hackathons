<?php   session_start(); ?>
<?php
if(isset($_SESSION['loggedin'])){
header('location:index.php');}
?>
<?php include("essentials/database.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    html,body{
    padding: 0px;
    height: 85%;
    width: 100%;
    overflow: hidden;
    background-size:     cover;
    background-repeat:   no-repeat;
    background-position: center;
    }
    #signinbox_index_web {
    background: #fff;
    border-radius: 4px;
    padding-top: 2px;
    padding-right: 5px;
    width: 380px;
    position: absolute;
    }
    #signinbox_index_mob {
    background: #fff;
    width: 100%;
    height: 100%;
    position: absolute;
    display: none;
    }
    .submit_index{
background-color:#4CAF50;
color: white;
padding: 11px;
font-size:15px;
border: none;
width: 150px;
cursor: pointer;
font-weight: normal;
font-family:courier new;
border-radius: 5%;
}
.submit_index:hover, .submit_index:focus {
background-color: #833AB4;
}
    .inva{
    font-family: courier new;
    font-weight: bold;
    color:#333;
    }
    .login_text_index {
    width: 100%;
    font-size: 15px;
    line-height: 1.4;
    padding-left: 8px;
    padding-right: 8px;
    min-height: 32px;
    margin-bottom: 8px;
    border:0.1px solid #e2e2e2;
    box-shadow: 0 0 5px;
    border-radius: 4px;
    }
    .login_text_index {
    width: 100%;
    font-size: 15px;
    line-height: 1.4;
    padding-left: 8px;
    padding-right: 8px;
    min-height: 32px;
    border-radius: 4px;
    }
    .link_index{}
    a{font-family:courier new;
      color: #833AB4;   }
    a:hover {
    color: hotpink;   }
    a:active {
    color: #333;  }
    </style>
    <title>Login</title>
    <link href="forum.css" rel="stylesheet" type="text/css">
  </head>
  <body background="img/back.jpg">
    <?php
    extract($_POST);
    if(isset($submit))
    {
    $rs=mysqli_query($con,"select * from userbase where username='$username' and password='$password'");
    if(mysqli_num_rows($rs)<1)
    {
    $found="N";
    }
    else
    {
    $_SESSION["loggedin"] = $username ;
    header('location:index.php');
    }
    }
    ?>
<div id="signinbox_index_web" style="position: absolute; top:5%;right:36%;">
      <br>
      <center><a href="index.php"><img class="logocircle" src="img/logo.png"  title="logo" width="240px" height="210px" border="0px"/></a></center>
      <centre><table align="center" style="padding-left: px;" WIDTH="70%" height="400px">
        <form method="post" name="login_form" action="" >
          <tr>
            <td><input class="login_text_index" type="text" title="enter your regitered LOGIN ID"  placeholder="USERNAME"  maxlength="20" size="25"   name="username" required />
          </td>
        </tr>
        <tr>
          <td><input class="login_text_index" type="password"  placeholder="ENTER PASSWORD" name="password"  required />
        </td>
      </tr>
      <?php
      if(isset($found))
      {
      echo '<span class="inva" style=""><center>Invalid Username or password</center></span>';
      }
      ?>
      <tr>
        <td>
    &emsp;&emsp;&emsp;&nbsp;<input class="submit_index" type="submit" name="submit" Value="Login"/></form>
        </td>
      </tr>
      <tr>
    <td><a class="link_index" onclick="window.location.href = 'forgot.php';" >Forgot Password</a>&emsp;&emsp;&nbsp;
      <a  class="link_index" onclick="window.location.href = 'signup.php';">Sign Up</a>
    </td>
  </tr>
</table></centre>
</div>
<script>
function myFunction(y) {
if (y.matches) {
document.getElementById("abt_visibility").style.display = "none";
document.getElementById("signinbox_index_web").style.display = "none";
document.getElementById("signinbox_index_mob").style.display = "block";
document.body.style.background = "none";
}else{
document.getElementById("signinbox_index_web").style.display = "block";
document.getElementById("signinbox_index_mob").style.display = "none";
document.getElementById("abt_visibility").style.display = "block";
document.body.style.background = "url(img/back.jpg)";
}
}
var y = window.matchMedia("(max-width: 420px)")
myFunction(y)
y.addListener(myFunction)
</script>
</body>
</html>