<?php include('config.php');?>
<!-- <?php

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
//log user in from login page
if (isset($_POST['login']))
{
    $uname= ($_POST['uname']);
    $pword= ($_POST['pword']);
    
if(empty($uname))
{
	array_push($errors, "Username is required");
}

if(empty($pword))
{
	array_push($errors, "Password is required");
}
	
	$sql="SELECT * FROM users WHERE uname='$uname' AND pword='$pword'";
	 $params= array();
	 $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$stmt = sqlsrv_query($conn,$sql,$params,$options);

	$count = sqlsrv_num_rows( $stmt );

	if($count==1){
		
		header("Location: home.php");		    
		}else{
            // array_push($errors,"wrong username/password");
            echo '<script type="text/javascript">
            window.onload = function () { alert("Username or password incorrect..!!"); }
            </script>';
		}   
}

?>  -->



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>C & D -Login</title>
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/images/bg-login.jpg');">
            <div class="wrap-login100 p-t-5 p-b-50">
                <span class="login100-form-title p-b-41">
                    Login panel
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="config.php">
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="uname" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pword" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                    	
                        <input type="submit" class="login100-form-btn" name="login" value="Login">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>