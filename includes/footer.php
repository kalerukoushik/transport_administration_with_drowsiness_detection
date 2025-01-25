<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
      
        <div class="col-md-6">
          <h6>About Us</h6>
          <ul>

          <li><a href="page.php?type=aboutus">About Us</a></li>
            <li><a href="car-listing.php">Car Listing</a></li>
            <!-- <li><a href="page.php?type=privacy">Privacy</a></li> -->
          <!-- <li><a href="page.php?type=terms">Terms of use</a></li> -->
          </ul>
        </div>
        <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <div style="color:white">
              <p class="uppercase_text" style="color:white">For Support Mail us : </p>
              <a href="mailto:srijithkumar.kt@gmail.com" style="color:white">srijithkumar.kt@gmail.com</a> </div><br><br><br>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text" style="color:white">Service Helpline Call Us: </p>
              <a href="tel:+91-7386-606-262" style="color:white">+91-7386-606-262</a> </div>
              </div>
      </div>
    </div>
  </div>
</footer>