
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
   if (isset($_POST['addproduct'])){
    $customerID = $_POST['customerID'];
    $customerName = $_POST['customerName'];
        $contactNum= $_POST['contactNum'];
    $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
    $shopName = $_POST['shopName'];
    $Action = $_POST['Action'];

    $sql = "SELECT * FROM customers";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query( $conn, $sql , $params, $options );
    
    $count = sqlsrv_num_rows( $stmt );

    if ($count==1) {
            header("location: customers.php");
           }
           else{
    echo "<script type='text/javascript'>alert('')</script>";
    //echo "Invalid Login Credentials";
   }

  }
   

?>


<a class="navbar-brand mr-1" > <h5 class="mt-1" style="color:black;"> You are in Deliver Medium Sector </h5> </a>
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
                        <a href="stores.php">Dashboard</a>
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
                                <div class="col-sm-6">
                                    <a href="#addWebModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Customer</span></a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="memberModalLabel">Edit Product Detail</h4>
                                    </div>
                                    <div class="dash">

                                    </div>

                                </div>
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
            $query = "SELECT * FROM  customers ";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>    
                                          <tr>
                                                    <td> <?php echo $row['customerID']; ?> </td>
                                                    <td> <?php echo $row['customerName']; ?> </td>
                                                    <td> <?php echo $row['contactNum']; ?> </td>
                                                    <td> <?php echo $row['address1']; ?> </td>
                                                    <td> <?php echo $row['address2']; ?> </td>
                                                    <td> <?php echo $row['shopName']; ?> </td>


                                 <?php
            }        
        ?>
             
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" style="color:#fff" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['customerID'];?>">
                                                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                                        </a>

                                                        <a onClick="slotDelete('<?php echo $row['custmerID']; ?>')" style="color:#fff" class="btn btn-sm btn-Danger">
                                                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;
                                                            </i>
                                                        </a> </td>

                                                </tr>
                                               
                                      </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal HTML -->
                    <div id="addWebModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="config.php" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Customers</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                       <!--  <?php include('errors.php'); ?> -->
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input type="text" class="form-control" name="product_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" name="contactNum" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address 1</label>
                                            <input type="text" class="form-control" name="address1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" class="form-control" name="address2" required>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label>Shop Name</label>
                                            <input type="text" class="form-control" name="shopName" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" name="addproduct" class="btn btn-success" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        function slotDelete(b) {
                            var id = b;
                            // alert(id);
                            if (window.confirm("Do you really want to Delete ?")) {
                                window.location.href = "config.php?product_delete=1&p_id=" + id + " ";
                            }
                        }
                    </script>
                  </body>

</html>