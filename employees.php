
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
  //  if (isset($_POST['addproduct'])){
  //   $productID = $_POST['productID'];
  //   $productName = $_POST['productName'];
  //   $itemCode= $_POST['itemCode'];
  //   $brand = $_POST['brand'];
  //   $category = $_POST['category'];
  //   $descript = $_POST['descript'];
  //   $price = $_POST['price'];
  //   $availability = $_POST['availability'];

  //   $sql = "SELECT * FROM products";
  //   $params = array();
  //   $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
  //   $stmt = sqlsrv_query( $conn, $sql , $params, $options );
    
  //   $count = sqlsrv_num_rows( $stmt );

  //   if ($count==1) {
  //           header("location: products.php");
  //          }
  //          else{
  //   echo "<script type='text/javascript'>alert('')</script>";
  
  //  }

  // }

   
//delet products
  if (isset($_GET['delete']))

{
$productID = ($_GET['empID']);
$sql1="DELETE FROM employee WHERE empID = $empID;";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt1= sqlsrv_query($conn, $sql1 , $params, $options );


header("Location: employees.php");
}
   


?>

<a class="navbar-brand mr-1" > <h5 class="mt-2" style="color:black;"> You are in Products Sector </h5> </a>

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
                    <li class="breadcrumb-item active">Employees Overview</li>
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
                                    <a href="" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employees</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div id="member" class="col-lg-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>EmployeeID</th>
                                                <th>Employee Name</th>
                                                <th>Employee's Contact</th>
                                                <th>Salary </th>
                                                <th>Position</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
            <?php
            $query = "SELECT * FROM employee ORDER BY empID ASC";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>    
                                          <tr>

                                            <form action=""  method="post">
                                                <td> <?php echo $row['empID']; ?> </td>
                                                    <td> <?php echo $row['empName']; ?> </td>
                                                    <td> <?php echo $row['empContact']; ?> </td>
                                                    <td> <?php echo $row['empSal']; ?> </td>
                                                    <td> <?php echo $row['empPos']; ?> </td>
                                                    
                                                    <input type="hidden" name="empID" value="<?php echo $row["empID"]; ?>">

                                                     <td>
                                                       <input type="submit" name="" value="Edit" class="btn btn-sm btn-primary"  class="material-icons" data-toggle="tooltip" title="Edit">&#xE;
                                                      
                                                       <!-- <input type="text" name="delete" value="" class="btn btn-sm btn-Danger"  class="material-icons" data-toggle="tooltip" title="Delete">&#xE;
                                                                             -->                                

                                                        <a onClick="slotDelete('<?php echo $row['empID']; ?>')" style="color:#fff" class="btn btn-sm btn-Danger">
                                                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;
                                                            </i>
                                                        </a> </td>
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

                   

                    <script>
                        function slotDelete(b) {
                            var id = b;
                            // alert(id);
                            if (window.confirm("Do you really want to Delete ?")) {
                                window.location.href = "employees.php?delete=1&empID=" + id + " ";
                            }
                        }
                    </script>
                  </body>

</html>