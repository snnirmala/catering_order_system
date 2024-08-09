<?php
session_start();
if(!isset($_SESSION["sh_user"]))
{
    header("Location: index.php");
}

?>
<!DOCTYPE>
<html en="lang">
<head>
<title>Dashboard::Messages</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/respond.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" /> 

<style>
    body{
            background: #f0f0f0;
        }
    sidebar-menu{
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
        
    .box {
            background: #fff;
            margin: 0 0 30px;
            border: solid 1px #e6e6e6;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 20px;
            -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
    thead{
        background: #816943;
        border-radius: 0px;
        color: white;
    }
    .nav-pills>li.active>a:hover{
        background: #816943;
    }
    .nav-pills>li.active>a{
        background: #816943;
        border-radius: 0px;
        }
    .navbar-text {
        margin-top: 15px;
        margin-bottom: 15px;
        font-size: 20px;
        }
    a{
        color: #816943;
    }
    a:hover{
        color: #816943;
    }
    .btn-default
    {
        background: #bd7f1c;
        color: #fff;
        border-color: #bd7f1c;
    }
    .btn-default:hover
    {
        background: #bd7f1c;
        color: #fff;
        border-color: #bd7f1c;
    }
    .list-group {
    padding-left: 0;
    margin-bottom: 0px;
}
    .list-group-item:hover {
    background-color: #f0f0f0;
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
				<center>
					Catering Ordering System
				</center>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
	</div>
    <nav class="navbar navbar-default navbar-fixed">
        <div class="navbar-header">
            <div class="navbar-text pull-right"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["sh_user"]; ?></div>
        </div>
    </nav>
    
        
        <div class="col-md-12">
            <div class="col-md-2">
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading"><span class="glyphicon glyphicon-th-large"></span> DASHBOARD</div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <?php 
                                    $link = mysqli_connect("localhost", "root", "", "cateringphp");
                                    $sql = "SELECT * FROM sh_contact";
                                    $res = mysqli_query($link,$sql);
                                    $sql1 = "SELECT * FROM sh_order";
                                    $res1 = mysqli_query($link,$sql1);
                                ?>
                                <li>
                                    <a href="dashboard.php"><i class="glyphicon glyphicon-list"></i> Orders <span class="badge pull-right"><?php echo mysqli_num_rows($res1); ?></span></a>
                                </li>
                                <li class="active">
                                    <a href="dashboard_message.php"><i class="glyphicon glyphicon-envelope"></i> Messages <span class="badge pull-right"><?php echo mysqli_num_rows($res); ?></span></a>
                                </li>
                                <?php
                                ?>
                                <li>
                                    <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <p class="lead">Inbox</p><hr>
                    
                                    
                    <?php 
                        $link = mysqli_connect("localhost", "root", "", "cateringphp");
                        function fill_name($link)
                            {
                                $output = '';
                                $sql1 = "SELECT * FROM sh_contact";
                                $data = mysqli_query($link,$sql1);
                                while($res=mysqli_fetch_array($data))
                                {
                                    ?>
                                    <ul class="list-group">
                                      <li class="list-group-item">
                                        <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                                           <a class="name" style="text-decoration:none;"><?php echo $output = $res['sh_fullname']; ?></a>  
                                      </li>
                                    </ul>
                                    <?php
                                }
                            //return $output;
                            }
                    echo fill_name($link);
                    ?>
                                        
                </div>
            </div>
                <div class="col-md-6">
                <div class="box">
                   <!--  <p class="pull-right"><?php echo date("Y-m-d H:i:s"); ?></p>
                    
                   <p class="lead"> Body</p><hr>-->
                    <div id="show_msg"></div>   
                    <p><hr></p>    
            </div>
            </div>
        </div>
    
 
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>

<script>
$(document).ready(function(){
    $('.name').click(function(){
        var name = $(this).html();
        $.ajax({
           url: "load.php",
           method: "POST",
           data:{name:name},
           success:function(data)
           {
               $('#show_msg').html(data);
           },
           error : function(d){
                console.log(d);
            }
    });
        
    });
    
});
</script>
