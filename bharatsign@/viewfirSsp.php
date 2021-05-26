<!DOCTYPE html>
<html>
<head>
	<style>
		.btn{
			background-color:maroon;
			border: 2px solid black;
			color: white;
			margin:10px 20px; 
			padding: 4px 9px;
		}
		.btn:hover{
			background-color: red;
			color: black;
			cursor: pointer;
		}
		.btn a{
			color: white;
			text-decoration: none;
		}
		.btn a:hover{
			color: black;
			cursor: pointer;
		}
	</style>
	<title>
		List Of Complaints
	</title>
</head>
<body style="margin: 0px;background-image: url(images/white-red.jpg); background-attachment: fixed; background-size: 100% 100%;">
	<div style="margin-top: -22px; background-color: lightgrey; height: 120px;"><br>
		<h1 style="font-size: 40px; font-family: serif; color: black;text-decoration: underline;"  align="center">List Of Complaints</h1>
	</div>
	<br><br><br><br>
</body>
</html>
<?php 
	include("config/db_connect.php");
	session_start();
	$u=$_SESSION['name'];
	$ac=$_SESSION['area_code'];
	$sql="SELECT * from fir where area_code like '$ac' and (status like 'Reject' and last_modified_by_user_role=3) or (status like 'Accept' or 'Inprogress' and last_modified_by_user_role=4)";
	$res=mysqli_query($conn,$sql);
	if(!$res){
		echo "ERROR";
	}
	else{
		while($r1=mysqli_fetch_row($res)){
			?>
			<html>
				<button class="btn"><a href="viewindiSho.php?id=<?php echo $r1[0];?>"><?php echo $r1[0].". ".$r1[3].": (".$r1[13].
				")";?></a> </button>
			</html>
			<?php 
		}
	}
?>
