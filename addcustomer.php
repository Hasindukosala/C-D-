<?php

   $serverName = "LAPTOP-1SBB3E04\SQLEXPRESS";

   $connectionInfo = array("Database"=>"dirm");
   $conn = sqlsrv_connect($serverName, $connectionInfo);

  /* if($conn) {
      echo "success. <br/>";
   }else {

    echo "failed.<br/>";
    die(print_r(sqlsrv_error(), true));
}*/
   if (isset($_POST['submit'])){
   $customerID = $_POST['customerID'];
    $customerName = $_POST['customerName'];
        $contactNum= $_POST['contactNum'];
    $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
    $shopName = $_POST['shopName'];

   $sql = "INSERT INTO customers (customerID,customerName,contactNum,address1,address2,shopName) VALUES (?,?,?,?,?,?) ";
   $param = array($customerID,$customerName,$contactNum,$address1,$address2,$shopName);
   $stmt = sqlsrv_query($conn,$sql,$param);

    if( $stmt == false ) {
             echo "<script type='text/javascript'>alert('Error')</script>";
           }else
           {
                    
          echo "<script type='text/javascript'>alert('Added Successfully!')</script>";
             
           }
   }
   
  
// Customer table update query 
if(isset($_POST['update'])){
    $customerID = ($_GET['customerID']);
    $customerName = $_GET['customerName'];
    $contactNum= $_GET['contactNum'];
    $address1 = $_GET['address1'];
    $address2 = $_GET['address2'];
    $shopName = $_GET['shopName'];
   
    
   $sql2 = "UPDATE customers
    SET customerName= $customerName, contactNum=$contactNum,address1=$address1,address2=$address2,shopName=$shopName
    WHERE customerID=$customerID";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt2= sqlsrv_query($conn, $sql2 , $params, $options );

    header("Location: customers.php");

}
 
    

?>
   
<!DOCTYPE html>
<html lang="en">
<head>
  <title>C & D Distibutors</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

</head>
<body>

<div class="container">
<div class="">
  <br><br>
  <h5>By clicking Add New Customer ,you can Insert New Customers</h5>
  <br>
  <p> </p>

  
  <!-- Button to Open the Modal Add Customers-->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Customers
    
  </button>
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Customers
    </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
     <!-- Modal body -->
        <div class="modal-body">
     <form class="login100-form validate-form p-b-33 p-t-5" action="addcustomer.php" method="post">
        
   <div class="wrap-input100 validate-input" data-validate="Enter Customer ID">
                        <input class="input100" type="text" name="customerID" placeholder="Customer ID"  required>
                        <span class="focus-input100" data-placeholder="ID"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Customer Name">
                        <input class="input100" type="text" name="customerName" placeholder="Customer Name" required>
                        <span class="focus-input100" data-placeholder="**"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Contact Number">
                        <input class="input100" type="text" name="contactNum" placeholder="Contact Number"  required>
                        <span class="focus-input100" data-placeholder="&&"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Address 1">
                        <input class="input100" type="text" name="address1" placeholder="Address 1">
                        <span class="focus-input100" data-placeholder="$$"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Address 2">
                        <input class="input100" type="text" name="address2" placeholder="Address 2">
                        <span class="focus-input100" data-placeholder="@@"></span>
      </div>
       <div class="wrap-input100 validate-input" data-validate="Enter Shop Name">
                        <input class="input100" type="text" name="shopName" placeholder="Shop Name "  required>
                        <span class="focus-input100" data-placeholder="##"></span>
      </div>
            
      <div class="modal-footer">
          <input type="submit" class="btn btn-warning"  name="submit" value="Submit" data-dismiss="">
           <a href="customers.php">
          <button type="button" class="btn btn-danger" data-dismiss="">Close</button></a>
        </div>    
    <!-- <b>Customer ID</b><br>
    <input type="text" name="customerID" required><br><br>

    <b>Customer Name</b><br>
    <input type="text" name="customerName" required><br><br>

    <b>Contact Number</b><br>
    <input type="text" name="contactNum" required><br><br>

    <b>Address1</b><br>
    <input type="text" name="address1" required><br><br>

    <b>Address2</b><br>
    <input type="text" name="address2" required><br><br>

     <b>Shop Name</b><br>
    <input type="text" name="shopName" required><br><br>

 
    <input type="submit" class="btn btn-warning"  name="submit" value="Submit" data-dismiss="">  -->

   

               
      </div>
    </div>
  </div>
  
</div>

</body>
</html>



