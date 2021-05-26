<?php 
	include("config/db_connect.php");
	session_start();
	$id=$_GET["id"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint-<?php echo $id;?></title>
</head>
<body style="margin: 0px;background-image: url(https://i.pinimg.com/originals/ff/5a/a9/ff5aa9f0387f70a6bf710caeb45ee699.jpg); background-attachment: fixed; background-size: 100% 100%;">
	<div style=" margin-top: -22px;  height: 120px;"><br>
		<h1 style="font-size: 60px; font-family: serif; color: black;text-decoration: underline;"  align="center">Complaint-<?php echo $id;?></h1>
	</div>
</body>
</html>
<?php 
	$sql="select * from fir where fir_id=$id";
	$res=mysqli_query($conn,$sql);
	$r=mysqli_fetch_row($res);
	$c=0;
	$elem= array('FIR ID','Username','Email','FIR Category','Section','Date Of Crime','Time Of Crime','FIR Content','Area Code','Date Time Of Complaint','Status','Last Modified By','Last Modified by User Role','Last Modified On','Proof1','Proof2','Proof3','Photo Sign','Optical Sign','Suspect1 Name','Suspect2 Name','Suspect1 Phone Number','Suspect2 Phone Number','Victim1 Name','Victim2 Name','Victim1 Phone Number','Victim2 Phone Number');
	$c=-1;
	foreach($r as $r1){
		$c=$c+1;
		if(!is_null($r1)){
			if($elem[$c]=='Proof1' || $elem[$c]=='Proof2' || $elem[$c]=='Proof3'){
				if($r1!=''){
					?>
					<div style="margin: 10%;">
					<h2  style="width: 50%; color:darkred;  display: inline; float: left;"> <?php echo $elem[$c];?></h2>
					<img  height="300px" width="600px" src="proof/<?php echo $r1;?>"></div>
					<?php
				}
			}
			else if($elem[$c]=='Photo Sign'){
				?>
				<div style="margin: 10%;">
				<h2  style="width: 50%; color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
				<img  height="300px" width="600px" src="photosign/<?php echo $r1;?>"></div>
				<?php
			}
			else if($elem[$c]=='Optical Sign'){
				?>
				<div style="margin: 10%;">
				<h2  style="width: 50%;color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
				<img border="2px solid black" style="background-color: white;" height="300px" width="600px" src="opticalsign/<?php echo $r1;?>"></div>
				<?php
			}
			else if($elem[$c]=='Last Modified by User Role'){
				if($r1==1){
					?>
					<div style="margin: 10%;">
						<h2  style="width: 50%; color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
						<h2 style="width: 50%;color:darkred; display: inline; float: right;"> <?php echo "Citizen";?></h2>
					</div>
					<?php
				}
				else if($r1==2){
					?>
					<div style="margin: 10%;">
						<h2  style="width: 50%; color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
						<h2 style="width: 50%;color:darkred; display: inline; float: right;"> <?php echo "SHO";?></h2>
					</div>
					<?php
				}
				else if($r1==3){
					?>
					<div style="margin: 10%;">
						<h2  style="width: 50%; color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
						<h2 style="width: 50%;color:darkred; display: inline; float: right;"> <?php echo "SP";?></h2>
					</div>
					<?php
				}
			}
		
			else if($elem[$c]=='Victim1 Phone Number' || $elem[$c]=='Victim2 Phone Number' || $elem[$c]=='Suspect1 Phone Number' || $elem[$c]=='Suspect2 Phone Number'){
				if($r1!=0){
					?>
					<div style="margin: 10%;">
						<h2  style="width: 50%; color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
						<h2 style="width: 50%;color:darkred; display: inline; float: right;"> <?php echo$r1;?></h2>
					</div>
					<?php
				}
			}

			else if($elem[$c]=='Victim1 Name' || $elem[$c]=='Victim2 Name' || $elem[$c]=='Suspect1 Name' || $elem[$c]=='Suspect2 Name'){
				if($r1!=''){
						?>
						<div style="margin: 10%;">
							<h2  style="width: 50%; color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
							<h2 style="width: 50%;color:darkred; display: inline; float: right;"> <?php echo$r1;?></h2>
						</div>
						<?php
					}
			}
			else if($elem[$c]=='Username' || $elem[$c]=='Email'){}
			else{
				?>
				<div style="margin: 10%;">
					<h2  style="width: 50%; color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
					<h2 style="width: 50%;color:darkred; display: inline; float: right;"> <?php echo$r1;?></h2>
				</div>
				<?php
			}
			// echo "<br>";
		}
		else if($elem[$c]=='Section'){
			?>
			<div style="margin: 10%;">
				<h2  style="width: 50%; color:darkred; display: inline; float: left;"> <?php echo $elem[$c];?></h2>
				<h2 style="width: 50%;color:darkred; display: inline; float: right;">---</h2>
			</div>
			<?php
		}
	}	
	?>
	<!-- <html>
	<body> -->
		<!-- <table> -->
			<!-- // </?php  -->
						
		<!-- // 	<tr>
		// 		<td>Username: </td>
		// 		<td> </td>
		// 	</tr>
		// </table>
	// </body>
	// </html> -->
	<!-- print_r(); -->
<!-- ?> -->