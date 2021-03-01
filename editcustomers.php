
<?php
  
   $serverName = "LAPTOP-1SBB3E04\SQLEXPRESS";

   $connectionInfo = array("Database"=>"dirm");
   $conn = sqlsrv_connect($serverName, $connectionInfo);
/*
   if($conn) {
      echo "success. <br/>";
   }else {

    echo "failed.<br/>";
    die(print_r(sqlsrv_error(), true));
}*/
   $customerID = $_POST['customerID'];
   
// Customer table update query 
if(isset($_POST['update'])){
    // $customerID = ($_GET['customerID']);
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

    header("Location: editcustomers.php");

}
 
?>

<a class="navbar-brand mr-1" > <h5 class="mt-2" style="color:black;"> You are in Edit Products Sector </h5> </a>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Panel</title>

    <link href="assets/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/table.css" rel="stylesheet">


    <!-- testing 123 -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .box {
            width: 800px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 25px;
        }

        #page_list li {
            padding: 16px;
            background-color: #f9f9f9;
            border: 1px dotted #ccc;
            cursor: move;
            margin-top: 12px;
        }

        #page_list li.ui-state-highlight {
            padding: 24px;
            background-color: #ffffcc;
            border: 1px dotted #ccc;
            cursor: move;
            margin-top: 12px;
        }
    </style>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="home.php">CMS</a>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p class="mt-2" style="color:#fff;"> Logged as Admin </p>
                    <!-- <i class="fas fa-user-circle fa-fw"></i> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <form method="GET" action="">
                        <input type="submit" class="dropdown-item" name="logout" value="Logout" data-toggle="modal" data-target="#logoutModal">
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="products.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Products</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_account.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>User Accounts</span></a>
            </li>
        </ul>

        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
                <hr>

                <!-- User mANAGE Table -->
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2></h2>
                                </div>
                                <!-- <div class="col-sm-6">
                                      
                                    <a href="" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Update</span></a>
                                </div> -->
                            </div>
                        </div>

                       
                        <div class="container">
                            <div class="row">
                                <div id="member" class="col-lg-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Customer ID</th>
                                                <th>Cutomer Name</th>
                                                <th>Contact Number</th>
                                                <th>Address 1</th>
                                                <th>Address 2</th>
                                                <th>Shop Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
            <?php
            $query = "SELECT * FROM  customers  WHERE customerID = '$customerID'";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>    
                                          <tr>
                                                     <form action="updatecustomer.php" method="post">
                                                    <td> <?php echo $row['customerID']; ?> </td>
                                                    <td> <?php echo $row['customerName']; ?> </td>
                                                    <td> <?php echo $row['contactNum']; ?> </td>
                                                    <td> <?php echo $row['address1']; ?> </td>
                                                    <td> <?php echo $row['address2']; ?> </td>
                                                    <td> <?php echo $row['shopName']; ?> </td>

                                                     <input type="hidden" name="customerID" value="<?php echo $row["customerID"]; ?>">
                                                     
                                                        

                                                   <td><input type="submit" name="update" value="Update" class="btn btn-sm btn-primary"  class="material-icons" data-toggle="tooltip" title="Update">&#xE;</td>                             
                                                  </form>
                                 <?php
            }        
        ?>
                              

                                                </tr>
                                               
                                      </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                   

                  <!--   <script>
                        function slotDelete(b) {
                            var id = b;
                            // alert(id);
                            if (window.confirm("Do you really want to Delete ?")) {
                                window.location.href = "config.php?delete=1&productID=" +productID + " ";
                            }
                        }
                    </script> -->
                      <!-- <script>
                        
                         function slotUpdate(u) {
                            var id = u;
                            // alert(id);
                            if (window.confirm("Do you really want to Update ?")) {
                                window.location.href = "updatecustomer.php?update=1& customerID=" + customerID + " ";
                            }
                        }
                    </script> -->
                  </body>

</html>