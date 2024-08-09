<?php
session_start();
if(isset($_SESSION["sh_user"]))
{
    header("Location: dashboard.php");
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

    .logo {
        font-size:29px;
        color:white;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

</style>
</head>

<body>
    <div class="header">
	     <div class="wrap">
			<div class="top-header">
				<div class="logo">
                    Catering Ordering System
				</div>
				<div class="clear"> </div>
			</div>
			<!---start-top-nav---->
			<div class="top-nav">
				<div class="top-nav-left">
					<ul>
						<li><a href="index.php" style="text-decoration:none;">Home</a></li>
						<!--<li><a href="about.php">About</a></li>
						<li><a href="services.php">Services</a></li>-->
						<li><a href="order.php" style="text-decoration:none;">Order</a></li>
                        <li><a href="contact.php" style="text-decoration:none;">Contact</a></li>
						<li class="active"><a href="index.php" style="text-decoration:none;">Login</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
    <div class="contact-form">
        <div id="box">
            <div id="error"></div>
            <form method="post">
                <div>
                    <span><label>USERNAME</label></span>
                    <span><input name="username" type="text" id="username" class="textbox"></span>
				</div>
                <div>
                    <span><label>PASSWORD</label></span>
                    <span><input name="password" type="password" id="password" class="textbox"></span>
				</div>
                <div>
                    <input class="mybutton" type="button" name="login" class="btn btn-primary" id="login" value="Login">
                </div>
				
            </form>
            <a href="register.php">Don't have an account?</a>
        </div>
        
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>

<script>
    $(document).ready(function(){
        $('#login').click(function(){
            var username = $('#username').val();
            var password = $('#password').val();
            
            if($.trim(username).length > 0 && $.trim(password).length > 0)
            {
                $.ajax({
                    url: "login.php",
                    method: "POST",
                    data: {"username":username, "password":password},
                    cache: false,
                    async: true,
                    beforeSend: function()
                    {
                        $('#login').val("Connecting...");
                    },
                    success: function(data)
                    {
                        if(data)
                        {
                            $("body").load("dashboard.php").hide().fadeIn(1500);
                            //window.location.href = ("dashboard.php");
                            //$(".messages").on("click", function(){$(this).hide()});
                        }else{
                            var options = {
                                distance : '40',
                                direction: 'left',
                                times: "3"
                            }
                            $(document).ready(function(){
                                $("#box").effect("cateringphp", options, 800);
                            $("#login").val("Login");
                            $("#error").html('<p class="text-danger">Invalid login credentials. Please try again.</p>');
                            });
                            
                        }
                    }
                });
            }else{
                $("#error").html('<p class="text-danger">Username/Password field cannot be empty. Please try again.</p>').hide().fadeToggle(1500).fadeOut(1500);
                return false;
                
            }
        });
    });
</script>