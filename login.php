<?php 
    include 'conx.php';

    session_start();
    
    error_reporting(0);
    
    if (isset($_SESSION['idClient'])) {
    }
    if (isset($_POST['signIn'])) {
        $email = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM client WHERE email='$email' AND pass='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row  = $result -> fetch_array(MYSQLI_ASSOC);
            $_SESSION['idClient'] = $row['idClient'];
            // header("Location: index.php");
            
        } else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="bootstrap.bundle.min.js"></script>
    <link href="bootstrap.min.css"  rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">
    <link  href="Style.Css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <div  class="flex-container">
        <form method="post"   id="box_left">
            <h2 >NEW AROUND HERE?</h2>
            <p>Create an online account with us to reap the benefits! 
                Fast and easy checkout, plus awesome reward benefits!</p>
            <a href="signUp.php" class="btn_login_a"  >REGISTER NOW</a>
            <!-- <input type="Submit" value=" REGISTER NOW " class="btn_login " /> -->
        </form>
        <form action="login.php" method="POST" enctype="multipart/form-data" id="box_rigth">
            <h2>WELCOME BACK</h2>
            <h4>Nice to see you again!</h4>
            <h6>Sign in below with your details</h6>
            <div class="textbox_login">
                <input type="text" class="text_login" name = "username"  value="<?php //echo $email; ?>" placeholder=" Email Address" required="required"/>
                <input type="password" class="text_login" name = "password" value="<?php //echo $_POST['password']; ?>" placeholder=" Password" required="required"/>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
            </div>
                <input type="Submit" value=" SIGN IN " name="signIn" class="btn_login " />
                <!-- <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p> -->
        </form>
    </div>
    <?php include 'footer.html' ?>
</body>
</html>