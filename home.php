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


//logout
if(isset($_GET['logout'])){
session_destroy();
header('location:index.php');
}


  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DashBoard Panel</title>

    <link href="assets/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/dropzone.css" />

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
 
.btn {
  background-color: ;
  border: none;
  color: white;
  padding: 25px 32px;
  font-size: 20px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
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
            <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">

                
                <p class="mt-2" style="color:#fff;"> Logged as ADMIN  </p>

                <li class="nav-item dropdown no-arrow">
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
                 <li class="nav-item">
                     <a class="nav-link" href="index.php">
                         <i class="fas fa-circle-o-notch""></i>
                         <span>Log Out</span></a>
                  
             </ul>

        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                   
                </ol> 
                <ol class="container-fluid"> <br>
                	<table>
                		<tr>

                			<td>
                                <a href="products.php">
                				 <button  class="btn btn-info">
   							 	<i class="fa fa-product-hunt fa-lg" aria-hidden="true"></i> <br><br> Products</button> &nbsp
                                                                    
                                </a>
   							</td>

   						
   							<td>
                                <a href="customers.php">
   								<button  class="btn btn-info">
   						    	<i class="fas fa-user fa-lg" aria-hidden="true"></i> <br><br> Customers </button> &nbsp
							     </a>
                            </td>
						
							<td>
                                <a href="stores.php">
								<button  class="btn btn-info">
   						    	<i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> <br><br> S t o r e s  </button> &nbsp
							     </a>
                            </td>
						</tr>	
					</table>
				</ol>	
			
			<ol class="container-fluid">
					<table>
                 		<tr>
                			<td>
                                <a href="porder.php">
                				<button  class="btn btn-info">
   							    <i class="fa fa-cart-plus fa-lg" aria-hidden="true"></i> <br><br>P/ Order</button> &nbsp
   							      </a>
                            </td>
   						
   							<td>
                                <a href="">
   								<button  class="btn btn-info">
   						 		<i class="fa fa-cart-arrow-down fa-lg" aria-hidden="true"></i> <br><br> G/Re Note</button> &nbsp
                                </a>							
                            </td>

						
							<td>
                                <a href="invoices.php">
								    <button  class="btn btn-info">
   								         <i class="fa fa-print fa-lg" aria-hidden="true"></i> <br><br> Invoices &nbsp</button> &nbsp
							     </a>
                            </td>
						</tr>
                   	</table>
   			</ol>
				<br><br><br><br>
				<div class="container-fluid">
 					 <div class="well">
 					 	<h5>Descriptions</h5>
 						 <p>P/Order : <span class="badge">Product Orders</span></p>
 						 <p>G/Re Note :<span class="badge">Goods Recieved Note</span></p>
 						 <p> <span class="badge"></span></p>
 					</div>
				</div>
                           
            </div>
        </div>
    </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script src="./assets/js/script.js"></script>
    <script type="text/javascript" src="./assets/js/dropzone.js"></script>


    <script>
                        function slotLogout(l) {
                            var id = l;
                            // alert(id);
                            if (window.confirm("Do you really want to logout ?")) {
                                window.location.href = "index.php?delete=1&uid=" + id + " ";
                            }
                        }
                    </script>
</body>

</html>