
<?php 
	session_start();
    include('config/db_connect.php');

	$name=$_POST['email'];
	$password=$_POST['password'];


	$s="select * from users where email='$name' && password='$password'";
	$result=mysqli_query($conn,$s);
	$num=mysqli_num_rows($result);
	if($num==1){
		$r1=mysqli_fetch_row($result);
		$role=$r1[4];
		$_SESSION['name']=$r1[0];
		$_SESSION['email']=$r1[1];
		$_SESSION['password']=$r1[2];
		$_SESSION['phno']=$r1[3];
		$_SESSION['user_role']=$r1[4];
		$_SESSION['area_code']=$r1[5];
		if($role==1){
			header('location:home.php');
		}
		else if($role==2){
			header('location:shoHome.php');	
		}
		else if ($role==3) {
			header('location:spHome.php');		
		}
		else if ($role==4) {
			header('location:sspHome.php');		
		}
		else{

		}
	}
	// else if($num==2){
	// 	$r1=mysqli_fetch_row($result);
	// 	$_SESSION['name']=$r1[0];
	// 	$_SESSION['email']=$r1[1];
	// 	$_SESSION['password']=$r1[2];
	// 	$_SESSION['phno']=$r1[3];
	// 	$_SESSION['user_role']=$r1[4];
	// 	$_SESSION['area_code']=$r1[5];
	
	// 			// print_r($_SESSION);
		
	// }
	else{
		header('location:index.php');
	}

?>

