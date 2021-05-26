<?php 
	include('config/db_connect.php');
	session_start();

	$u=$email=$cat=$fc=$ac=$sec=$d=$t=$s=$lmb=$lmo=$p1=$p2=$p3=$ps=$os=$s1=$s2=$s1p=$s2p=$v1=$v2=$v1p=$v2p=null;
	$u=$_SESSION["name"];
	$email=$_SESSION["email"];
	$cat=$_POST["fircat"];
	if($cat=='Harassment'){
		$sec="Section 66A";
	}
	else if($cat=='Murder'){
		$sec="Section 302,303,304";
	}
	else if($cat=='Theft'){
		$sec="Section 379A";
	}
	else{
		// $sec='null';
	}

	if(isset($_POST["fir_content"]) && trim($_POST["fir_content"])!=''){
		$fc=trim($_POST["fir_content"]);
	}
	else{
		$_SESSION["error"]="Enter FIR Contents";
		header("location:fir.php");
		exit();
	}
	if(isset($_POST["sus1"]) && trim($_POST["sus1"])!=''){
		if(ver($_POST["sus1"])){
			$s1=trim($_POST["sus1"]);
		}
		else{
			$_SESSION["error"]="Suspect1 name should contains only alphabets and spaces";
			header("location:fir.php");
			exit();
		}
	}
	if(isset($_POST["sus2"]) && trim($_POST["sus2"])!=''){
		if(ver($_POST["sus2"])){
			$s2=trim($_POST["sus2"]);
		}
		else{
			$_SESSION["error"]="Suspect2 name should contains only alphabets and spaces";
			header("location:fir.php");
			exit();
		}

	}
	if(isset($_POST["s1pn"]) && trim($_POST["s1pn"])!=''){
		if(verph(trim($_POST["s1pn"]))){
			$v1p=trim($_POST["s1pn"]);
		}
		else{
			$_SESSION["error"]="Enter a valid phone number of Suspect1";	
			header("location:fir.php");
			exit();
		}
	}
	if(isset($_POST["s2pn"]) && trim($_POST["s2pn"])!=''){
		if(verph(trim($_POST["s2pn"]))){
			$v1p=trim($_POST["s2pn"]);
		}
		else{
			$_SESSION["error"]="Enter a valid phone number of Suspect2";	
			header("location:fir.php");
			exit();
		}
	}
	if(isset($_POST["vic1"]) && trim($_POST["vic1"])!=''){
		if(ver($_POST["vic1"])){
			$v1=trim($_POST["vic1"]);
		}
		else{
			$_SESSION["error"]="Victim1 name should contains only alphabets and spaces";
			header("location:fir.php");
			exit();
		}
	}
	if(isset($_POST["vic2"]) && trim($_POST["vic2"])!=''){
		if(ver($_POST["vic2"])){
			$v1=trim($_POST["vic2"]);
		}
		else{
			$_SESSION["error"]="Victim2 name should contains only alphabets and spaces";
			header("location:fir.php");
			exit();
		}
	}
	if(isset($_POST["v1pn"]) && trim($_POST["v1pn"])!=''){
		if(verph(trim($_POST["v1pn"]))){
			$v1p=trim($_POST["v1pn"]);
		}
		else{
			$_SESSION["error"]="Enter a valid phone number of Victim1";	
			header("location:fir.php");
			exit();
		}

	}
	if(isset($_POST["v2pn"]) && trim($_POST["v2pn"])!=''){
		if(verph(trim($_POST["v2pn"]))){
			$v1p=trim($_POST["v2pn"]);
		}
		else{
			$_SESSION["error"]="Enter a valid phone number of Victim2";	
			header("location:fir.php");
			exit();
		}
	}

	$ac=$_POST["AreaCode"];
	$s=1;
	$d=$_POST["date"];
	$t=$_POST["time"];
	$lmb=$email;


	if(isset($_FILES["proof1"]) && $_FILES["proof1"]["size"]!=0){
		$p1=uniqid().'.jpg';
		$f1=$_FILES["proof1"]["tmp_name"];
		move_uploaded_file($f1, "proof/".$p1);
	}
	if(isset($_FILES["proof2"]) && $_FILES["proof2"]["size"]!=0){
		$p2=uniqid().'.jpg';
		$f1=$_FILES["proof2"]["tmp_name"];
		move_uploaded_file($f1, "proof/".$p2);
	}
	if(isset($_FILES["proof3"]) && $_FILES["proof3"]["size"]!=0){
		$p3=uniqid().'.jpg';
		$f1=$_FILES["proof3"]["tmp_name"];
		move_uploaded_file($f1, "proof/".$p3);
	}
	$ps=$_POST["image"];
	$folderPath = "photosign/";
	$image_parts = explode(";base64,", $ps);
	$image_base64 = base64_decode($image_parts[1]);
	$fileName = uniqid().'.png';
	$ps=$fileName;
	$file = $folderPath . $fileName;
	file_put_contents($file, $image_base64);
	$os=$_POST["signature"];
	$folderPath = "opticalsign/";
	$image_parts = explode(";base64,", $os);
	$image_base64 = base64_decode($image_parts[1]);
	$fileName = uniqid().'.png';
	$os=$fileName;
	$file = $folderPath . $fileName;
	file_put_contents($file, $image_base64);
	
	
	$sql="insert into fir (username,email,fir_category,section,date_of_crime,time_of_crime,fir_content,area_code,status,last_modified_by,proof1,proof2,proof3,photosign,opticalsign,suspect1_name,suspect2_name,suspect1_phone_number,suspect2_phone_number,victim1_name,victim2_name,victim1_phone_number,victim2_phone_number) values('$u','$email','$cat','$sec','$d','$t','$fc','$ac','$s','$lmb','$p1','$p2','$p3','$ps','$os','$s1','$s2','$s1p','$s2p','$v1','$v2','$v1p','$v2p')";
	if(mysqli_query($conn,$sql)){
	 	?>
		<script type="text/javascript">
	 	alert("Petition Successfully Registered."); 
	  	</script>
		<?php
		$_SESSION['alert']=true;
			header("location:home.php");
	}
	else{
		echo "ERROR.........!   :(((((";
	}
	function ver($n1){
		return preg_match('/^[a-zA-Z\s]+$/', $n1);
	}
	function verph($p1){
		return is_numeric($p1) && strlen($p1)==10;
	}
?>