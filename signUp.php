<?php 
    session_start();
    include 'conx.php';

    error_reporting(0);
    if (isset($_SESSION['Code_C'])) {
        // header("Location: signUp.php");
    }

    if (isset($_POST['signUp'])) {
        $id=$_POST['id'];
        $Fname = $_POST["firstname"];
        $Lname = $_POST["lastname"];
        $Adress = $_POST["Address"];
        $phone = $_POST["Phone"];
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];
        $Confirmation_Password = $_POST["Confirmation_Password"];

        if ($Password == $Confirmation_Password ) {
            $sql = "SELECT * FROM cliente WHERE Email='$Email'";
            $result = $conn->query($sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO `client`(`nom`, `prenom`, `adresse`, `telephone`, `email`, `pass`)
                    VALUES ('$Fname','$Lname','$Adress','$phone','$Email','$Password');";
                 $result = $conn->query($sql);
                if ($result) {
                    echo "<script>alert('Wow! User Registration Completed.')</script>";
                    $id="";
                    $Fname = "";
                    $Lname = "";
                    $Adress = "";
                    $phone = "";
                    $Email = "";
                    $_POST['Password'] = "";
                    $_POST['Confirmation_Password'] = "";
                } else {
                    echo "<script>alert('Woops! Something Wrong Went.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";
            }
            
        } else {
            echo "<script>alert('Password Not Matched.')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="Style.Css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <div class="container text-center py-5 signUp">
            <div class="bg_form">
                <br>
                <div class="newAROUND">
                    <h1>NEW AROUND HERE?</h1>
                </div>
                <form action="signUp.php" method="POST" class="inputs">
                    <input type="text" name="firstname" value="<?php echo $Fname; ?>" placeholder=" First Name" required="required">
                    <input type="text" name="lastname" value="<?php echo $Lname; ?>" placeholder=" Last Name" required="required">
                    <input type="text" name="Address" value="<?php echo $Adress; ?>" placeholder=" Address" required="required">
                    <input type="text" name="Phone" value="<?php echo $phone; ?>" placeholder=" Phone" required="required">
                    <input type="text" name="Email" value="<?php echo $Email; ?>" placeholder=" Email" required="required">
                    <input type="password" name="Password" value="<?php echo $Password; ?>" placeholder=" Password" required="required">
                    <input type="password" name="Confirmation_Password" value="<?php echo $Confirmation_Password ; ?>" placeholder="  Confirmation Password" required="required">
                    <input type="submit" name="signUp" value="SIGN UP" class="btn_pr btn_sign mt-5 my-5" />
                </form>
            </div>
    </div>
    <?php include 'footer.html' ?>
</body>
</html>