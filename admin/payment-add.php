<?php
session_start();
include('includes/config.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
      $regno = $_POST['regno'];
      $user = $_POST['user'];
      $paytype = $_POST['paytype'];
      $amount = $_POST['amount'];

$sql="INSERT INTO  addpayment VALUES(:regno,:user, :paytype, :amount)";
$query = $dbh->prepare($sql);
$query->bindParam(':regno',$regno,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':paytype',$paytype,PDO::PARAM_STR);
$query->bindParam(':amount',$amount,PDO::PARAM_STR);
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

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<link rel="shortcut icon" href="img/favicon.png">
	
	<title>Admin of Car Rental Services</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.dropdown{
    width: 80%;
    height: 30px;
}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Upload Payment details</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading" style="background-color:#2c3136; color:white">Form fields</div>
									<div class="panel-body" style="margin-left:-20%">
										<form method="post" action="payment-add.php" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Reg No.</label>
												<div class="col-sm-8">
                                                <select name="regno" id="regno" class="form-control">
                                                    <option disabled selected>-- Select a Vehcile--</option>
                                                    <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.regno,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {?>	
                                                        <option value="<?php echo htmlentities($result->regno);?>"><?php echo htmlentities($result->regno);?></option>
                                                        <?php $cnt=$cnt+1; }} ?>
                                                        
                                                    </select>
												</div>
											</div>
                                            <div class="form-group">
                                            <label class="col-sm-4 control-label">Username</label>
												<div class="col-sm-8">
                                                    <select name="user" class="form-control">
                                                        <option disabled selected>-- Select User --</option>
                                                        <?php $sql = "SELECT DISTINCT(FullName) from tblusers";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {?>	
                                                        <option value="<?php echo htmlentities($result->FullName);?>"><?php echo htmlentities($result->FullName);?></option>
                                                        <?php $cnt=$cnt+1; }} ?>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-4 control-label">Payment type</label>
                                            <div class="col-sm-8">
                                            <select name="paytype" id="paytype" class="form-control">
                                                <option disabled selected>-- Select Payment type --</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Card">Card</option>
                                                <option value="GPay">Google Pay</option>
                                                <option value="paytm">Paytm</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="amount" class="form-control" placeholder="Amount">
                                                </div>
                                            </div>

											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" style=" width:200px;font-size:17px;" name="submit" type="submit">Submit</button>
												</div>
											</div><br><br><br><br>

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
    
</body>

</html>