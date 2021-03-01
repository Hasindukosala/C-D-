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



//logout
if(isset($_GET['logout'])){
session_destroy();
header('location:index.php');
}
