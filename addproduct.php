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
  $productID = $_POST['productID'];
    $productName = $_POST['productName'];
        $itemCode= $_POST['itemCode'];
    $brand = $_POST['brand'];
        $category = $_POST['category'];
    $descript = $_POST['descript'];
    $price = $_POST['price'];
     $availability = $_POST['availability'];

   $sql = "INSERT INTO products (productID,productName,itemCode,brand,category,descript,price,availability) VALUES (?,?,?,?,?,?,?,?) ";
   $param = array($productID,$productName,$itemCode,$brand,$category,$descript,$price,$availability);
   $stmt = sqlsrv_query($conn,$sql,$param);

    if( $stmt == false ) {
             echo "<script type='text/javascript'>alert('Error')</script>";
           }else
           {
                    
          echo "<script type='text/javascript'>alert('Added Successfully!')</script>";
             
           }
   }
   

    

?>
   
<!DOCTYPE html>
<html lang="en">
<head>
  <title>C & D Distibutors</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,shrink-to-fit=no">
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
  <h5>By Clicking Add New Products ,You can Insert New Products</h5>
  <br>

  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Products
    
  </button>
  </div>

  
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Products</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
     <!-- Modal body -->
        <div class="modal-body">
     
        
    <form class="login100-form validate-form p-b-33 p-t-5" action="addproduct.php" method="post">
    


      <div class="wrap-input100 validate-input" data-validate="Enter Product ID">
                        <input class="input100" type="text" name="productID" placeholder="Product ID"  required>
                        <span class="focus-input100" data-placeholder="ID"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Product Name">
                        <input class="input100" type="text" name="productName" placeholder="Product Name">
                        <span class="focus-input100" data-placeholder="**"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Product Item Code">
                        <input class="input100" type="text" name="itemCode" placeholder="Item Code"  required>
                        <span class="focus-input100" data-placeholder="&&"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Product Brand">
                        <input class="input100" type="text" name="brand" placeholder="Product Brand" required>
                        <span class="focus-input100" data-placeholder="$$"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Product Category">
                        <input class="input100" type="text" name="category" placeholder="Product Category"  required>
                        <span class="focus-input100" data-placeholder="@@"></span>
      </div>
       <div class="wrap-input100 validate-input" data-validate="Enter Product Description">
                        <input class="input100" type="text" name="descript" placeholder="Product Description">
                        <span class="focus-input100" data-placeholder="##"></span>
      </div>
       <div class="wrap-input100 validate-input" data-validate="Enter Product Price">
                        <input class="input100" type="text" name="price" placeholder="Product price"  required>
                        <span class="focus-input100" data-placeholder="Rs."></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Enter Product Availability">
                        <input class="input100" type="text" name="availability" placeholder="Available/ Not Available"  required>
                        <span class="focus-input100" data-placeholder="!!"></span>
      </div>
     
      <div class="modal-footer">
          <input type="submit" class="btn btn-warning"  name="submit" value="Submit" data-dismiss="">
           <a href="products.php">
          <button type="button" class="btn btn-danger" data-dismiss="">Close</button></a>
        </div>    
   
    </form>
  </div>
        

        
      </div>
    </div>
  </div>
  
</div>

</body>
</html>

