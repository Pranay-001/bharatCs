<?php
session_start();
if(!isset($_SESSION['name'])){
	header('location:home.php');
}

if(isset($_SESSION["error"])){
    if(trim($_SESSION["error"])!=''){
        $e=$_SESSION["error"];
        echo ";
        <script type='text/javascript'>
            alert('$e');
        </script>";
        $_SESSION["error"]='';
        $e='';
    }
}
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
	<body class="x1">
		<div class="container">
			<br>
			<h1 class="text-white bg-dark text-center">Details</h1>
			<div class="col-lg-8 m-auto d-block">
				<form action="firinput.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="user">Username: <?php echo $_SESSION['name'];?> </label><br>
                        <label for="email">Email: <?php echo $_SESSION['email'];?> </label><br>
                        <label for="phno">Phone-no.: <?php echo $_SESSION['phno'];?> </label><br>
					</div>
                    <div class="form-group">
                        <label for="fircat">Select FIR Category: &nbsp;</label>
                        <select name="fircat" id="fircat" style="font-size: 20px;">
                            <option value="Others">Others</option>
                            <option value="Harassment">Harassment</option>
                            <option value="Murder">Murder</option>
                            <option value="Theft">Theft</option>
                        </select>
                        <br><br>
                        <label for="date">Date Of Crime: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="date" name="date" id="date" required>
                        <br><br>
                        <label for="time">Time Of Crime: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="time" name="time" id="time" required>
                    </div>
                    <div class="form-group">
                        <label for ="fir_content" >Fir-Content: </label><br>
                        <textarea name="fir_content" rows="10" cols="100">    
                        </textarea required> 
					<div class="form-group">
						<label for="AreaCode">AreaCode: </label><br>
						<input type="text" name="AreaCode" id="user1" required>
					</div>
                    <div class="form-group">
                        <label for="proof1">Proof1 :</label><br>
                        <input type="file" name="proof1" id="proof1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="proof2">Proof2 : </label><br>
                        <input type="file" name="proof2" id="proof2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="proof3">Proof3 : </label><br>
                        <input type="file" name="proof3" id="proof3" class="form-control">
                    </div>


                    <div class="form-group"> Photo Signature </div>
                    <div class="form-group">

                    <div class="form-group">

                        <div id="my_camera"></div>
                        <br/>
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">

                        <input style="display: none;" type="text" name="image" class="image-tag" required>
                    </div>
                    <div >
                        <div class="form-group" id="results">Your captured image will appear here...</div>
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


                    <div class="form-group">

                        <label for="sus1">Suspect1_name: </label>
                        <input type="text" name="sus1" id="sus1" >
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <label for="s1pn">Suspect1_Phone-no.: </label>
                        <input type="text" name="s1pn" id="s1pn" >
                    </div>
                    <div class="form-group">

                        <label for="sus2">Suspect2_name: </label>
                        <input type="text" name="sus2" id="sus2" >
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <label for="s2pn">Suspect2_Phone-no.: </label>
                        <input type="text" name="s2pn" id="s2pn" >
                    </div>
                    <div class="form-group">

                        <label for="vic1">Victim1_name: &nbsp;&nbsp;</label>
                        <input type="text" name="vic1" id="vic1" >
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <label for="v1pn">Victim1_Phone-no.:  &nbsp;&nbsp;</label>
                        <input type="text" name="v1pn" id="v1pn" >
                    </div>
                    <div class="form-group">
                        <label for="vic2">Victim2_name: &nbsp;&nbsp;</label>
                        <input type="text" name="vic2" id="vic2">
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <label for="v2pn">Victim2_Phone-no.:  &nbsp;&nbsp;</label>
                        <input type="text" name="v2pn" id="v2pn" >
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
