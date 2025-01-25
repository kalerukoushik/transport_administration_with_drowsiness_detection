<?php 
session_start();
include('includes/config.php');
error_reporting(0);

if(isset($_POST['sent']))
  {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $regno = $_POST['regno'];
$msg=$_POST['msg'];
$sql="INSERT INTO  emergencychat(username, email, phone, regno, msg) VALUES(:username,:email, :phone, :regno, :msg)";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':regno',$regno,PDO::PARAM_STR);
$query->bindParam(':msg',$msg,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Message Sent. We will contact you shortly";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Car Rental Service</title>
<!-- css -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<style>
.chat {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container1::after {
  content: "";
  clear: both;
  display: table;
}

.container1 img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container1 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.chat-box{
    width:700px;
    height:50px;

}
.send{
    background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 3px;
}
</style>
<body>
 
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!-- chat -->
<center><br>
<h3>Emergency Call</h3>
<br>
<button class="btn outline btn-xs active-btn" style="width:30%; height:30%;"> <a href="tel:+91-9535667401" style="color:black"> Call Us</a></button>
<br><br>
<p>OR</p>
<h3>Emergency Chat</h3>

<div class="container1 chat">
<!-- <h5>To Admin</h5> -->
<p class="time-right">Time: <span id="datetime"></span></p>
<?php
  $email=$_SESSION['login'];
  $sql1 ="SELECT * FROM tblusers WHERE EmailId=:email ";
  $query1= $dbh -> prepare($sql1);
  $query1-> bindParam(':email', $email, PDO::PARAM_STR);
  $query1-> execute();
  $results=$query1->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>
<form align="left" method="POST">
<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
            <div class="form-group">
              <label class="control-label">Username <span>*</span></label>
              <input type="text" name="username"  value="<?php echo htmlentities($result->FullName);?>" class="form-control white_bg" id="username" required>
            </div>
            <div class="form-group">
              <label class="control-label">Email <span>*</span></label>
              <input type="email" name="email" value="<?php echo htmlentities($result->EmailId);?>" class="form-control white_bg" id="username" required>
            </div>
            <div class="form-group">
              <label class="control-label">Booked Vehicle Registration No. <span>*</span></label>
              <input type="text" name="regno" value="<?php echo htmlentities($result->regno);?>" class="form-control white_bg" required>
            </div>
            <div class="form-group">
              <label class="control-label">Active Phone Number <span>*</span></label>
              <input type="text" name="phone" value="<?php echo htmlentities($result->ContactNo);?>" class="form-control white_bg" id="phonenumber" required>
            </div>
            <div class="form-group">
                <label class="control-label">Message <span>*</span></label>
                <textarea name="msg" id="msg" cols="100" rows="10" placeholder="Type your message here..."></textarea>
            </div>
            <div class="form-group" align="center">
              <button class="btn" type="submit" name="sent" type="submit">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
            </form>
<?php }}?>
</div>
</center>
<!-- end chat -->

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleString();
</script>
</body>

</html>