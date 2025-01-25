<?php 
session_start();
include('includes/config.php');
error_reporting(0);

if(isset($_POST['pay']))
  {
      $price = $_POST['price'];
      $phone = $_POST['phone'];
      $cardname = $_POST['cardname'];
      $cardno = $_POST['cardno'];
      $expmonth = $_POST['expmonth'];
      $expyear = $_POST['expyear'];
      $cvv = $_POST['cvv'];

    
$sql="INSERT INTO payment VALUES(:price, :phone, :cardname, :cardno, :expmonth, :expyear, :cvv)";
$query = $dbh->prepare($sql);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':cardname',$cardname,PDO::PARAM_STR);
$query->bindParam(':cardno',$cardno,PDO::PARAM_STR);
$query->bindParam(':expmonth',$expmonth,PDO::PARAM_STR);
$query->bindParam(':expyear',$expyear,PDO::PARAM_STR);
$query->bindParam(':cvv',$cvv,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Payment Successful.";
header('location: my-booking.php');
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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<style>

 .row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0 -16px;
}

 .col-25 {
  -ms-flex: 25%;
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%;
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%;
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}
/*  
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}  */

input[type=text], select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<body>
 
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<div class="container">
<div class="row">
  <div class="col-75">
    <div class="container"><br><br>
    <h3>Make Payment</h3>
    <form align="left" method="POST" onSubmit="return valid();">
    <div class="panel-body">
    <?php if($error){?><div class="errorWrap" style="color:red"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color:green"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?><div>
            <div class="form-group">
              <label class="control-label">Advance Payment (min 300) <span>*</span></label>
              <input type="text" name="price"  class="form-control white_bg" required>
            </div>
            <div class="form-group">
              <label class="control-label">Mobile Number (Google Pay Number)<span>*</span></label>
              <input type="text" name="phone" class="form-control white_bg" required>
            </div>
            <div class="form-group">
              <label class="control-label">Name on Card <span>*</span></label>
              <input type="text" name="cardname" class="form-control white_bg" required>
            </div>
            <div class="form-group">
              <label class="control-label">Card number <span>*</span></label>
              <input type="text" name="cardno"  class="form-control white_bg" required>
            </div>
            <div class="form-group">
              <label class="control-label">Exp Month <span>*</span></label>
              <select name="expmonth" id="">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Exp Year <span>*</span></label>
              <input type="text" name="expyear"  class="form-control white_bg" required>
            </div>
            <div class="form-group">
              <label class="control-label">CVV <span>*</span></label>
              <input type="password" name="cvv"  class="form-control white_bg" required>
            </div>
            <div class="form-group" align="center">
              <button class="btn" type="submit" name="pay" type="submit">Send Message </button>
            </div>
            </form>
</div>
</center>

          
    </div>
  </div>
  </div>
</div>


<!--Footer -->
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

</body>

</html>