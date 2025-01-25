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
if (isset($_POST['add_fitness'])) {
    // receive all input values from the form
    $slno = $_POST['slno'];
    $regno = $_POST['regno'];
    $eng_no = $_POST['eng_no'];
    $chasis_no = $_POST['chasis_no'];
    $reg_issue = $_POST['reg_issue'];
    $fitness_issue = $_POST['fitness_issue'];
    $fitness_expire = $_POST['fitness_expire'];
    $insurance_issue = $_POST['insurance_issue'];
    $insurance_expire = $_POST['insurance_expire'];
    
    $sql = "INSERT INTO add_fitness (slno, regno, eng_no, chasis_no, reg_issue, fitness_issue, fitness_expire, insurance_issue, insurance_expire) 
                  VALUES(:slno, :regno, :eng_no, :chasis_no, :reg_issue, :fitness_issue, :fitness_expire, :insurance_issue, :insurance_expire)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':slno',$slno,PDO::PARAM_STR);
    $query->bindParam(':regno',$regno,PDO::PARAM_STR);
    $query->bindParam(':eng_no',$eng_no,PDO::PARAM_STR);
    $query->bindParam(':chasis_no',$chasis_no,PDO::PARAM_STR);
    $query->bindParam(':reg_issue',$reg_issue,PDO::PARAM_STR);
    $query->bindParam(':fitness_issue',$fitness_issue,PDO::PARAM_STR);
    $query->bindParam(':fitness_expire',$fitness_expire,PDO::PARAM_STR);
    $query->bindParam(':insurance_issue',$insurance_issue,PDO::PARAM_STR);
    $query->bindParam(':insurance_expire',$insurance_expire,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId)
    {
    $msg="Details Added successfully";
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
					
						<h2 class="page-title">Add Fitness </h2>

						<div class="row" style="width:100%">
							<div class="col-md-10" style="width:100%">
								<div class="panel panel-default">
									<div class="panel-heading" style="background-color:#2c3136; color:white">Form fields</div>
									<div class="panel-body">
                                    <table  class="table table-bordered ">
                <form name="vehicle_fitness_form" class="form-horizontal" id="notice-submit" action="fitness-add.php" method="post" >
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <?php include('errors.php'); ?>
                    <thead>
                        <tr>
                            <th class="center"> Particular</th>
                            <th class="center">Issue Date</th >
                            <th class="center"> Expire Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <div class="form-group center">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="v_id">Vehicle Registration No&nbsp;&nbsp;<span class="fa fa-asterisk red" style="color:red;"></span> </label>
                                    <div class="col-xs-12 col-sm-9">
                                        <div class="clearfix" >
													<select name="regno" id="regno" class="dropdown">
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
                                                        <?php } ?>
                                                    </select>
												</div>
											</div>
											<div class="hr-dashed"></div>

									</div>
								</div>
                                </td>
                                </tr>

                                <tr>
                            <td colspan="3">
                                <div class="form-group center">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="v_id">Engine No &nbsp;&nbsp;<span class="fa fa-asterisk red" style="color:red;"></span> </label>
                                    <div class="col-xs-12 col-sm-9">
                                        <div class="clearfix" >
                                        <input type="text" name="eng_no" id=""  placeholder="Engine No" class="col-xs-12 datepicker form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td colspan="3">
                                <div class="form-group center">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="v_id">Chasis No &nbsp;&nbsp;<span class="fa fa-asterisk red" style="color:red;"></span> </label>
                                    <div class="col-xs-12 col-sm-9">
                                        <div class="clearfix" >
                                        <input type="text" name="chasis_no" id=""  placeholder="Chasis No" class="col-xs-12 datepicker form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            </tr>
                                <tr>
                            <td >
                                <div class="form-group center">
                                    <label class="control-label col-xs-12 col-sm-12 no-padding-right" for="datepicker">Registration</label>								
                                </div>
                            </td>
                            <td colspan="3">										
                                <div class="clearfix col-xs-12">
                                    <input type="text" name="reg_issue" id=""  placeholder="Registration Date" class="col-xs-12 datepicker form-control"/>
                                </div>										
                            </td>
                        </tr>
                        <tr>								
                            <td >
                                <div class="form-group center">
                                    <label class="control-label col-xs-12 col-sm-12 no-padding-right" for="datepicker">Fitness</label>								
                                </div>
                            </td>
                            <td>										
                                <div class="clearfix col-xs-12 ">
                                    <input type="text" name="fitness_issue" id=""  placeholder="Fitness Date" class="col-xs-12 datepicker form-control"/>							
                                </div>										
                            </td>
                            <td>										
                                <div class="clearfix col-xs-12">
                                    <input type="text" name="fitness_expire" id=""  placeholder="Fitness Date" class="col-xs-12 datepicker form-control"/>										
                                </div>										
                            </td>
                        </tr>
                        <tr>								
                            <td >
                                <div class="form-group center">
                                    <label class="control-label col-xs-12 col-sm-12 no-padding-right" for="">Insurance</label>								
                                </div>									
                            </td>
                            <td>								
                                <div class="clearfix col-xs-12 ">
                                    <input type="text" name="insurance_issue" id=""  placeholder="Insurance Date" class="col-xs-12 datepicker form-control"/>																		
                                </div>
                            </td>
                            <td>										
                                <div class="clearfix col-xs-12">
                                    <input type="text" name="insurance_expire" id=""  placeholder="Insurance Date" class="col-xs-12  datepicker form-control"/>										
                                </div>									
                            </td>
                        </tr>		
                        <tr> 
                            <td colspan="3">
                                <div class="col-md-offset-1 col-md-9" style="margin-left: 25%;">
                                    <button class="btn btn-danger w-md m-b-5" style="width:200px;font-size:15px;">Cancel</button>
                                    <button  type="submit" name="add_fitness" class="btn btn-primary w-md m-b-5" style="width:200px;font-size:15px;"><i class="fa fa-plus"></i> Save</button>
                                </div>
                            </td>
                        </tr>						
							</div>
							
						</div>
						
					

					</div>
                    </form>
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
