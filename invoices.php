
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
  //  


 if (isset($_POST['display'])){
  
        $itemCode= $_POST['itemCode'];
        $item_qty= $_POST['itemCode'];
  

   $sql = "SELECT * FROM  [invoiceDetails] WHERE itemCode ='@itemCode' AND item_qty > '@item_qty'";
   $param = array();
   $stmt = sqlsrv_query($conn,$sql,$param);

    if( $stmt == false ) {
             echo "<script type='text/javascript'>alert('Error')</script>";
           }else
           {
                    
          echo "<script type='text/javascript'>alert('yor invoice filter generated !')</script>";
             
           }
   }


?>


<a class="navbar-brand mr-1" > <h5 class="mt-1" style="color:black;"> You are in Warehouse Sector </h5> </a>
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
                <a class="nav-link" href="employees.php">
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
                    <li class="breadcrumb-item active">sample Invoice</li>
                </ol>
                <hr>
                       

                        <div class="container">
                            <div class="row">
                                <div id="member" class="col-lg-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Customer ID</th>
                                                <th>Shop Name</th>
                                                <th>Address1</th>
                                                <th>Address2</th>
                                                <th>Order ID</th>
                                                <th>Item Code</th>
                                                <th>Item Qty</th>
                                                <th>Total Price</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           
            <?php
            $query = "SELECT * FROM  [invoiceDetails] WHERE itemCode ='1027' AND item_qty > 5 ";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>    
                                          <tr>
                                                    <td> <?php echo $row['customerID']; ?> </td>
                                                    <td> <?php echo $row['shopName']; ?> </td>
                                                    <td> <?php echo $row['address1']; ?> </td>
                                                     <td> <?php echo $row['address2']; ?> </td>
                                                    <td> <?php echo $row['orderID']; ?> </td>
                                                    <td> <?php echo $row['itemCode']; ?> </td>
                                                     <td> <?php echo $row['item_qty']; ?> </td>
                                                    <td> <?php echo $row['totalPrice']; ?> </td>
                                                                                                        

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

<!-- 
                    <script>
                        function slotDelete(b) {
                            var id = b;
                            // alert(id);
                            if (window.confirm("Do you really want to Delete ?")) {
                                window.location.href = "?delete=1&p_id=" + id + " ";
                            }
                        }
                    </script> -->
                  </body>

</html>