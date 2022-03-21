<?php
   include 'conx.php';
   session_start();
   $Quantité = $_POST["stock"];
   $id_client = $_SESSION['idClient'];
   $id = $_REQUEST['idProduit'];
   $Adress = "";
   $total_price = 0;
   $SqlSelect = "SELECT * FROM `client` where idClient = $id_client;";
   $result = $conn->query($SqlSelect); 
   $row = $result -> fetch_assoc(); 
   if(isset($_Post["newAdress"]) && $_Post["newAdress"]!=""){
        $Adress = $_Post["newAdress"];
   }else{
        $Adress = $row["adresse"];
   }
//    $sqlInssert_cmd = "INSERT INTO `commande`(,`Adresse`, `Date_cmd`, `Code_C`) VALUES ('$Adress','".date("y-m-d")."','$id_client');";
//    $conn->query($sqlInssert_cmd);
//    $cart = unserialize(serialize($_SESSION['cart_item']));
//    for($i=0;$i<count($cart);$i++){
//         $sqlInsert_details = "INSERT INTO `detail` 
//         VALUES ('.$cart[$i]->$Quantité.','.$cart[$i]->$id_client.','.$cart[$i]->$id.');";
//         $conn->query($sqlInsert_details);
//    }
// //    $sqlInssert_cmd = "INSERT INTO `commande`(`Adresse`, `Date_cmd`, `Code_C`) VALUES ('$Adress','".date("y-m-d")."','$id_client');";
//    $conn->query($sqlInssert_cmd);
//    $order_id = $conn->insert_id;
//    $sqlInsert_details = "INSERT INTO `detail` VALUES ('$Quantité','$id_client',' $id');";
//    $conn->query($sqlInsert_details);
   if(isset($_POST["submit"])){
        $to = 'bouzine.mariam.solicode@gmail.com';
        $subject = 'check out';
        $message = 'test'; 
        $from = 'mariam.bouzine2000@gmail.com';
        
        // Sending email
        if(mail($to, $subject, $message)){
            echo '<script> alert("Your mail has been sent successfully.")</script>';
        } else{
            echo '<script> alert("Unable to send email. Please try again.")</script>';
        }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="nadastyle.css">
    <link  href="Style.Css" rel="stylesheet">
    <title>Document</title>
</head>
<body>  
    <?php include 'navbar.php' ?>
    <main class="d-flex flex-row justify-content-center p-5">
        <div class="left-side">
            <form action="shipping.php" class="d-flex flex-column"  method="POST" enctype="multipart/form-data">
                <?php
                    
                    if (isset($_SESSION['idClient'])) {
                        $id_client = $_SESSION['idClient'];
                        $SqlSelect = "SELECT * FROM `client` where idClient = $id_client;";
                        $result = $conn->query($SqlSelect); 
                        $row = $result -> fetch_assoc(); 
                        
                    
                    foreach ( $result as $row ) {  
                ?>
                <legend class="text-center">Shipping information</legend>
                <input class="ship_inp" value="<?php echo $row["nom"] ?>" name="Fname" type="text" placeholder="First Name" disabled>
                <input class="ship_inp" value="<?php echo $row["prenom"] ?>" name="Lname" type="text" placeholder="Last name" disabled>
                <input class="ship_inp" value="<?php echo $row["telephone"] ?>" name="phone" type="text" placeholder="Phone number" disabled>
                <input class="ship_inp" value="<?php echo $row["adresse"] ?>" name="Adress" type="text" placeholder="Adress" disabled>
                <input class="ship_inp" name="newAdress" style="display" id="newAdress" type="text" placeholder="New Adress">
                <div class="radio">
                <label for="yes_radio">Yes</label><input name="adress_radio" id="yes_radio" type="radio" value="yes" onclick="adress_click(this)">
                <label for="no_radio">No</label><input name="adress_radio" id="no_radio" type="radio" value="no" checked onclick="adress_click(this)">
                </div>
                <input class="subm_inp" value="submit" type="submit">
                <?php }} ?>
            </form>
        
            <form class="bag_details">
               
                <span class="bag">Bag</span>
                <?php   
                    if (isset($_SESSION['cart_item'])) {
                        
                        foreach($_SESSION["cart_item"] as $item){
                            $total_price += $item["prix"]*$item["stock"];
                ?>
                <div class="prod">
                    <div class="img_bag">
                        <img src="<?php echo "products/". $item["image"]  ?>" style="width: 100px;" alt="">
                    </div>
                    <div class="prod_bag">
                        <p class="prod_name"><?php echo $item["libelle"]; ?></p>
                        <p class="prod_price"><?php echo $item["prix"]; ?></p>
                        <p class="prod_price"><?php echo $item["stock"]; ?></p>
                    </div>
                </div>
                <?php }} ?>
            </form>
        </div>

        <form  action="shipping.php"  method="POST" class="right_side d-flex flex-column justify-content-start align-items-center">
            <h2 class="text-center">Order summary</h2>
            <div class="total_details d-flex justify-content-center align-items-center">
                <span class="">Total</span>
                <span class=""><?php echo number_format($total_price, 2)." DH"; ?></span>
            </div>
            <input class="pay_btn" type="submit" name="submit" value="PAY">
            <p class="text-center">Sheeny protects your personal and payment information</p>
            <img src="img/secure.png" alt="secure" style="width: 200px;">
        </form>
    </main>
    <?php include 'footer.html' ?>
    <script src="confirm.js"></script>
</body>
</html>