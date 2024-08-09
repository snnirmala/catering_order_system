<!doctype html>
<html>
<head>
    <title>Catering Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/respond.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
</head>

<style>
	 .logo {
        font-size:29px;
        color:white;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
</style>
    
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
			<!---start-top-nav---->
			<div class="top-nav">
				<div class="top-nav-left">
					<ul>
						<li><a href="index.php" style="text-decoration:none;">Home</a></li>
						<li class="active"><a href="order.php" style="text-decoration:none;">Order</a></li>
                        <li><a href="contact.php" style="text-decoration:none;">Contact</a></li>
						<li><a href="index.php" style="text-decoration:none;">Login</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
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
    
if(isset($_POST["fullname"]) && isset($_POST["mobile"]))
{
    $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $mobile = mysqli_real_escape_string($link, $_POST['mobile']);
    $company = mysqli_real_escape_string($link, $_POST['companyname']);
    $budget = mysqli_real_escape_string($link, $_POST['budget']);
    $people = mysqli_real_escape_string($link, $_POST['people']);
    $function = mysqli_real_escape_string($link, $_POST['function']);
    $menu = mysqli_real_escape_string($link, $_POST['menu']);
    $service = mysqli_real_escape_string($link, $_POST['service']);
    $detailsvenue = mysqli_real_escape_string($link, $_POST['detailsvenue']);
    $addressvenue = mysqli_real_escape_string($link, $_POST['addressvenue']);
    $datetime = mysqli_real_escape_string($link, $_POST['datetime']);
    
        if(!empty($fullname) && !empty($mobile)){
        $sql = "INSERT INTO sh_order(sh_fullname, sh_email, sh_mobile, sh_companyname, sh_budget, sh_people, sh_function, sh_menu, sh_service, sh_detailsvenue, sh_addressvenue, sh_datetime) VALUES ('$fullname', '$email', '$mobile', '$company', '$budget', '$people', '$function', '$menu', '$service', '$detailsvenue', '$addressvenue', '$datetime')";
            $reg = mysqli_query($link, $sql);
            $reg = mysqli_affected_rows($link);

            if($reg > 0)
            {
                echo '<div class="bs-callout-info">';
                echo 'Order successful!';
                echo '</div>';
            }
            else
            {
                echo '<div class="bs-callout-danger">';
                echo 'No required field must be left blank. Please check the required fields';
                echo '</div>';
            }
           }
}
?>
    <div class="content">
		 	<!---start-contact---->
		 	<div class="contact">
		 		<div class="wrap">
				<div class="section group">	
                <form method="post">
				<div class="col span_1_of_3">
				  <div class="contact-form">
				  	<h3>Contact Info</h3>
					    
					    	<div>
						    	<span><label>FULL NAME *</label></span>
						    	<span><input name="fullname" type="text" class="textbox" required></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL *</label></span>
						    	<span><input name="email" type="email" class="textbox" required></span>
						    </div>
						    <div>
						     	<span><label>CONTACT *</label></span>
						    	<span><input name="mobile" type="text" class="textbox" required></span>
						    </div>
                            <div>
						     	<span><label>COMPANY NAME (If applicable)</label></span>
						    	<span><input name="companyname" type="text" class="textbox"></span>
						    </div>

				    </div>
  				</div>
                <div class="col span_1_of_3">
				  <div class="contact-form">
				  	<h3>Preferences</h3>
					    	<div>
						    	<span><label>What is your budget? *</label></span>                           
                                <span><input class="textbox" type="text" name="budget" placeholder="Rs" required></span>
						    </div>
						    <div>
						    	<span><label>How many people are you expecting? *</label></span>
						    	<span><input name="people" type="text" class="textbox" required></span>
						    </div>
						    <div>
						     	<span><label>Type of Function *</label></span>
						    	<span><select class="form-control" type="checkbox" name="function" required>
                                  <option>Marriage</option>
                                  <option>Birthday</option>
							
                                  <option>Festivals</option>
                                  <option>Comapany meeting</option>
                                </select></span>
						    </div>
						    <div>
						    	<span><label>Preferred Menu *</label></span>
						    	<span><select class="form-control" type="text" name="menu" required>
                                  <option>Select one</option>
								  <option>Tiffen</option>
                                  <option>Lunch</option>
                                  <option>Dinner</option>
                                  <option>Morning and Afternoon tea</option>
								  <option>All of the above</option>
                                </select></span>
						    </div>
				    </div>
  				</div>
                <div class="col span_1_of_3">
				  <div class="contact-form">
				  	<h3>Preferences</h3>
					    	<div>
						    	<span><label>Type of Service *</label></span>
						    	<span><select class="form-control" type="text" name="service" required>
                                  <option>Select one</option>
                                  <option>On Site</option>
                                  <option>Pick Up</option>
                                  <option>Staff Required</option>
                                </select></span>
						    </div>
                            <div>
						    	<span><label>Venue Details and type of menu required *</label></span>
						    	<span><textarea name="detailsvenue" required> </textarea></span>
						    </div>
						    <div>
						    	<span><label>Venue Address *</label></span>
						    	<span><input name="addressvenue" type="text" class="textbox" required></span>
						    </div>
                            <input type="hidden" name="datetime" value="<?php echo time(); ?>">
						    <div>
						   		<span><input type="submit" class="mybutton" value="Submit"></span>
						    </div>
				    </div>
  				</div>
                </form>
			  </div>
			</div>
			</div>
		 	<!---End-contact---->
		 <!---End-content---->
		 <!---start-footer---->
		 <div class="footer">
		<div class="wrap">
			<div class="footer-grid">
				<h3>About us</h3>
				<p> In Catering Ordering System, we service healthy food, in your hostel we have master cook,user can easily order , user add personal details to contact with admin </p>
				
			</div>
			<div class="footer-grid center-grid">
				<h3>Recent posts</h3>
				<ul>
					<li><a href="recent.html">lunch</a></li>
					<li><a href="recent.html">tea and coffee</a></li>
					<li><a href="recent.html">tiffen</a></li>
					<li><a href="recent.html">serve</a></li>
					
				</ul>
			</div>
			
			<div class="clear"> </div>
		</div>
		<div class="clear"> </div>
	</div>
	<div class="copy-right">
		<div class="top-to-page">
						<a href="#top" class="scroll"> </a>
						<div class="clear"> </div>
					</div>
		
	</div>
		 <!---End-footer---->
	


</div>
    
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>