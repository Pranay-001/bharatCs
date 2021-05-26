<?php 
	include("config/db_connect.php");
	session_start();
	// print_r($_SESSION["user_role"]);
	// print_r($_SESSION);
	// if($_SESSION["sig"]){
	// 	echo $_SESSION["sig"];
	// }
	// else{
	// 	echo ":(((((";
	// }
	$id=$_SESSION["id"];
	$us=$_SESSION["email"];
	$up=$_POST["status"];

	$s=$_POST["section"];
	$c='';
	if(trim($_POST["comments"])!=''){
		$c=trim($_POST["comments"]);
	}
	$usr=$_SESSION["user_role"];
	$ps=$_POST["image"];
	$folderPath = "updatelogPhotosign/";
	$image_parts = explode(";base64,", $ps);	
	$image_base64 = base64_decode($image_parts[1]);
	$fileName = uniqid().'.png';
	$ps=$fileName;
	$file = $folderPath . $fileName;
	file_put_contents($file, $image_base64);
	$os=$_POST["signature"];
	$folderPath = "updatelogOpticalsign/";
	$image_parts = explode(";base64,", $os);
	$image_base64 = base64_decode($image_parts[1]);
	$fileName = uniqid().'.png';
	$os=$fileName;
	$file = $folderPath . $fileName;
	file_put_contents($file, $image_base64);
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');
	$sql="Insert into fir_change_log(fir_id,user_role,modified_by,status,photosign,opticalsign,comments) values('$id','$usr','$us','$up','$ps','$os','$c')";
	$up="Update fir set section='$s',last_modified_by='$us',last_modified_by_user_role='$usr',last_modified_on='$date', status='$up' where fir_id=$id";
	if(mysqli_query($conn,$sql) && mysqli_query($conn,$up)){
		if($usr==2){
			header("Location:shoHome.php");
		}
		else if($usr==3){
			header("Location:spHome.php");	
		}
		else if ($usr==4) {
			header("Location:sspHome.php");
		}
		else{
			
		}
	}
	else{
		echo ":(((((((((";
	}
?>