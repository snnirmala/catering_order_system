<?php
$link = mysqli_connect("localhost", "root", "", "cateringphp");
        if(!$link)
        {
            die('Could not connect ' . mysql_error());
        }

        $db_selected = mysqli_select_db($link, "cateringphp");

        if(!$db_selected)
        {
            die('Can\'t use '. 'cateringphp' . ' database!' .  mysql_error());
        }
    
if(isset($_POST["username"]) && isset($_POST["password"]))
{
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = md5(mysqli_real_escape_string($link, $_POST['password']));
    
        if(!empty($username) && !empty($password))
        {
            $sql = "INSERT INTO sh_user(sh_user, sh_pass) VALUES ('$username', '$password')";
                mysqli_query($link, $sql);
                $reg = mysqli_affected_rows($link);

                if($reg > 0)
                {
                    //echo '<p style="background: #fef15b; border: 1px solid #eedc82; padding: 7px 10px;">';
                    echo '<div class="bs-callout-info">';
                    echo 'Registration successful!';
                    echo '</div>';
                }
                else
                {
                    echo '<div class="bs-callout-danger">';
                    echo 'Oops! There was a problem trying to register you.';
                    echo '</div>';
                }
        }
}
?>
<!doctype html>
<html>
<head>
    <title>Catering Order</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/respond.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
<style type="text/css">
    #box{
        width: 100%;
        max-width: 500px;
        border: 1px solid #f1ede4;
        border-radius: 0px;
        margin: 0 auto;
        padding: 0 20px;
        box-sizing: border-box;
        height: 250px;
        margin-top: 100px;
        
    }
</style>
</head>

<body>
     <div class="header">
	     <div class="wrap">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="logo.jpg" width="100" height="100" title="logo"></a>
				</div>
				<div class="top-header center-grid"><h4> Catering Ordering System </h4> </div>
				<div class="clear"> </div>
			</div>
			<!---start-top-nav---->
			<div class="top-nav">
				<div class="top-nav-left">
					<ul>
						<li><a href="index.php" style="text-decoration:none;">Home</a></li>
						<li><a href="order.php" style="text-decoration:none;">Order</a></li>
                        <li><a href="contact.php" style="text-decoration:none;">Contact</a></li>
						<li class="active"><a href="register.php" style="text-decoration:none;">Register</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
  
<div class="container">
        <div class="col-md-6">
        <div style="width: 960px; background: #fff; border: 1px solid #e4e4e4; padding: 20px; margin: 10px auto;">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-user"></span> Register</h3>
            </div>
        </div>
        <form action="register.php" method="post">
            
                <div class="input-group"> 
                    <input type="text" name="username" class="form-control" placeholder="Username" required="true">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="true">
	 <input type="password" name="reentry password" class="form-control" placeholder="rentry Password" required="true">
     <span class="input-group-addon"><button type="submit" class="btn btn-warning" role="button">Sign up</button></span> 
                </div>
                <br>
                <p>Already a member? <a href="index.php">Login</a></p>
             </form>
            </div>
       
    </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body> 
</html>