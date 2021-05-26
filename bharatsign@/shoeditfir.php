<?php 
	include("config/db_connect.php");
	session_start();
	$id=$_GET["id"];
	$_SESSION["id"]=$id;
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Evidence Upload
	</title>
	<style>
 		.x1{
 			background-image:url("https://i.pinimg.com/originals/ff/5a/a9/ff5aa9f0387f70a6bf710caeb45ee699.jpg");
 			background-size: 100% 100%;
            background-attachment: fixed;
 			background-color: transparent;
 		}
 	</style>
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <style type="text/css">

        #results { 
        	padding:20px;
        	 /*border:0.5px; */
        	 background:transparent;
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        #canvasDiv{
            position: relative;
            border: 2px dashed grey;
            height:300px;
        }
    </style>
</head>
	<body class="x1" style="margin: 0px;background-image: url(https://i.pinimg.com/originals/ff/5a/a9/ff5aa9f0387f70a6bf710caeb45ee699.jpg); background-attachment: fixed; background-size: 100% 100%;">
		<div style=" margin-top: -22px;  height: 120px;"><br>
		<h1 style="font-size: 60px; font-family: serif; color: black;text-decoration: underline; font-weight: 900;"  align="center">Complaint-<?php echo $id;?></h1>
		</div>
		<div class="container">
			<div class="col-lg-8 m-auto d-block">
				<form action="editsho.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					<label for="status"><h2>Update status:</h2></label>
					<select class="status" name="status" style="font-size: 20px;">
						<option style="font-size: 20px;" value="Accept">Accept</option>
						<option style="font-size: 20px;" value="Inprogress">Inprogress</option>
						<option style="font-size: 20px;" value="Reject">Reject</option>
						<option style="font-size: 20px;" value="Closed">Closed</option>
					</select>
					</div>
					<div class="form-group">
						<label for="section"><h2>Section: </h2></label>
						<input style="margin-left: 30px;"type="text" name="section" value="<?php echo $_SESSION["sec"];?>">
					</div>
					<div class="form-group">
						<label for="comments"><h2>Comments:</h2></label>
						<br>
						<textarea name="comments" cols="80" rows="5"></textarea>
					</div>
                    <div class="form-group"><h2> Photo Signature</h2> </div>
                    <div class="form-group">

                    <div class="form-group">
                        <div id="my_camera"></div>
                        <br/>
                        <input style="background: lightgrey; font-family: cursive;" type=button value="Take Snapshot" onClick="take_snapshot()">

                        <input style="display: none;" type="text" name="image" class="image-tag" required>
                    </div>
                    <div >
                        <div class="form-group" id="results"><h4>Your captured image will appear here...</h4></div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-group">
                            <br>
                            <?php echo isset($msg)?$msg:''; ?>
                            <h2>Signature Pad</h2>
                            <hr>
                            <div id="canvasDiv"></div>
                            <br>
                            <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
                        </div>
                            <input style="display: none;" type="text" id="signature" name="signature" required>
                    </div>
					<input type="submit" name="submit" id="btn-save" value="submit" class="btn btn-success">
				</form>
			</div>
		</div>
		<script language="JavaScript">

		    Webcam.set({

		        width: 400,

		        height: 300,

		        image_format: 'jpeg',

		        jpeg_quality: 90

		    });

		    Webcam.attach( '#my_camera' );
		    function take_snapshot() {
		    	var char=false;
		        Webcam.snap( function(data_uri) {

		            $(".image-tag").val(data_uri);
		            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
		            char=true;
		        } );

		    }
		</script>


		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        // $("#").click(function() {
        // 	if(clickX==[] && clickY==[] && clickDrag==[]){
        // 		$_SESSION["sig"]=true;
        // 	}
        // 	else{
        // 		$_SESSION["sig"]=false;
        // 	}
        // });

        $(document).on('click', '#btn-save', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);
            // $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })

</script>
	</body>
</html>
