<?php 
    include('config/db_connect.php');
    session_start();
    //header('location:register1.php');
    $name = $email = $password = $cpassword=$phnp=$a_c='';
    $errors = array('name' => '', 'email' => '', 'password' => '','cpassword'=>'','phno'=>'','a_c'=>'');

    if(isset($_POST['submit'])){
        
        // check email
        if(empty($_POST['name'])){
            $errors['name'] = 'A User name is required';
        }
        else{
            $name = $_POST['name'];
            $s="SELECT * FROM registered_users WHERE name='$name'";
            $result=mysqli_query($conn,$s);
            $num=mysqli_num_rows($result);
            if($num==1){
                     $errors['name'] =  "User name already taken";
            }
            else{
                if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                      $errors['name'] = 'User name must be letters and spaces only';
                }
            }
       }
        // check title
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
        } 
        else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
            $password = test_input($_POST["password"]);
            $cpassword = test_input($_POST["cpassword"]);
            if (strlen($_POST["password"]) <= '8') {
                $errors['password'] = "Your Password Must Contain At Least 8 Characters!";
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
                 $errors['password'] ="Your Password Must Contain At Least 1 Number!";
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
                $errors['password'] = "Your Password Must Contain At Least 1 Capital Letter!";
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                $errors['password'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
            }
        }
        else if(!empty($_POST["password"])) {
             $errors['cpassword'] = "Please Check Your Password!";
        } 
        else{
             $errors['password'] = "Please enter password   ";
        }

        if(!empty($_POST["phno"])){
            if(!is_numeric($_POST["phno"]) || strlen($_POST["phno"])!=10){
                $errors["phno"]="Please enter valid phone number!";
            }
            else{
                $phno=$_POST["phno"];
            }
        }
        if(!empty($_POST["a_c"])){
            if(!is_numeric($_POST["a_c"]) || strlen($_POST["a_c"])!=6){
                $errors["a_c"]="Please enter valid area code!";
            }
            else{
                $a_c=$_POST["a_c"];
            }
        }

        if(!array_filter($errors)){
            //echo 'form is valid';
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password= mysqli_real_escape_string($conn, $_POST['password']);

            // create sql
            $sql = "INSERT INTO users(username,email,password,phno,area_code) VALUES('$name','$email','$password','$phno','$a_c')";

            // save to db and check
            if(mysqli_query($conn, $sql)){
                // success
                //header('Location: home.php');
                header('location:index.php');
            
            } 
            else {
                echo 'query error: '. mysqli_error($conn);
            }
            // header('Location: index.php');
        }

    } // end POST check
    function test_input($data) {
     $data = trim($data);
     // $data = stripslashes($data);
     // $data = htmlspecialchars($data);  
     return $data;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" action="register1.php" class="signup-form">
                        <h2 class="form-title">Create account</h2>

                        <div class="form-group">
                            <input type="text" class="form-input" name="name"  id="name" placeholder="Your Name" required />
                            <div class="red-text"><?php echo $errors['name']; ?></div>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-input" name="email"  id="email" placeholder="Your Email" required />
                             <div class="red-text"><?php echo $errors['email']; ?></div>
                        </div>
                       

                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <div class="red-text"><?php echo $errors['password']; ?></div>
                        </div>
                        

                        <div class="form-group">
                            <input type="password" class="form-input" name="cpassword" id="cpassword" placeholder="Repeat your password" required />
                            <div class="red-text"><?php echo $errors['cpassword']; ?></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="phno" id="phno" placeholder="Enter your phone number" required />
                            <div class="red-text"><?php echo $errors['phno']; ?></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="a_c" id="a_c" placeholder=" Enter your area code" required />
                            <div class="red-text"><?php echo $errors['a_c']; ?></div>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>

                    <p class="loginhere">
                        Have already an account ? <a href="index.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>