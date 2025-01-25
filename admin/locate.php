<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
{
$brand=$_POST['brand'];
$sql="INSERT INTO  tblbrands(BrandName) VALUES(:brand)";
$query = $dbh->prepare($sql);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Brand Created successfully";
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
					
						<h2 class="page-title">Locate Vehicles</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading" style="background-color:#2c3136; color:white">Form fields</div>
									<div class="panel-body">
										<form method="post" name="locate" class="form-horizontal" onsubmit="myLocation()">
											<div class="form-group">
												<label class="col-sm-4 control-label">Vehicle Reg no.</label>
												<div class="col-sm-8">
													<select name="regno" id="regno" class="dropdown">
                                                    <option disabled selected>-- Select a Vehicle--</option>
                                                    <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.regno,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {?>	
                                                        <option value="<?php echo $cnt;?>"><?php echo htmlentities($result->regno);?></option>
                                                        <?php $cnt=$cnt+1; }} ?>
                                                        <?php } ?>
                                                    </select>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" style="width:200px;font-size:17px;" name="submit" onclick="myLocation();" type="submit">Locate</button>
												</div>
											</div>
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
    <script>
        function myLocation(){
            regnumber = document.locate.regno.value;
			console.log(regnumber);
            if(regnumber == "1"){
                url = "https://www.google.com/maps?q=dilsukhnagar";
                window.open(url);
			}
			else if(regnumber == "2"){
                url = "https://www.google.com/maps/dir/Boduppal,+Hyderabad,+Telangana/17.3477636,78.5518644/@17.3487249,78.5518615,16.35z/data=!4m8!4m7!1m5!1m1!1s0x3bcb9ebec375d469:0x1fec424f78c142ba!2m2!1d78.5783446!2d17.4138552!1m0";
                window.open(url);
			}
			else if(regnumber == "3"){
                url = "https://www.google.com/maps?q=Ambedkar Chowk";
                window.open(url);
			}
			else if(regnumber == "4"){
                url = "https://www.google.com/maps?q=Boduppal Colony Rd Sai Bhavani Nagar, Jyothi Nagar Colony, Boduppal, Hyderabad, Telangana 500092";
                window.open(url);
			}
			else if(regnumber == "5"){
                url = "https://www.google.com/maps?q=Boduppal Colony Rd Sai Bhavani Nagar, Jyothi Nagar Colony, Boduppal, Hyderabad, Telangana 500092";
                window.open(url);
			}
			else if(regnumber == "6"){
                url = "https://www.google.com/maps?q=Boduppal Colony Rd Sai Bhavani Nagar, Jyothi Nagar Colony, Boduppal, Hyderabad, Telangana 500092";
                window.open(url);
			}
			else if(regnumber == "7"){
                url = "https://www.google.com/maps?q=Boduppal Colony Rd Sai Bhavani Nagar, Jyothi Nagar Colony, Boduppal, Hyderabad, Telangana 500092";
                window.open(url);
			}
			else if(regnumber == "8"){
                url = "https://www.google.com/maps?q=Boduppal Colony Rd Sai Bhavani Nagar, Jyothi Nagar Colony, Boduppal, Hyderabad, Telangana 500092";
                window.open(url);
            }
    }
    </script>
</body>

</html>
