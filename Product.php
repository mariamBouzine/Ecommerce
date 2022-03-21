
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="bootstrap.bundle.min.js"></script>
    <link  href="Style.Css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
    <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        require 'conx.php';
        if(isset($_REQUEST['idProduit'])) {
            $id = $_REQUEST['idProduit'];
            $sqlSelect = "SELECT * FROM `produit` WHERE idProduit = '$id' ";  
            $result = $conn->query($sqlSelect);
            $row = $result -> fetch_array();
        }
    ?>
    <?php include 'navbar.php' ?>
<!--------------------- produit -------------------------->
    <form  method="POST" action="bag.php?action=add&idProduit=<?php echo $row["idProduit"]; ?>"  enctype="multipart/form-data" >
        <div class=" container produit">
            <div class="row ">
                <div class="col-5">
                    <img class="img_produit" src="<?php echo "products/". $row["image"]  ?>" alt="">
                </div>
                <div class="bg_produit1 col-7 text-center my-4">
                    <h2 class="text_pr" name="Libellé"><?php echo $row["libelle"]  ?></h2>
                    <!-- <h4 class="text_pr">lipstick, 3.5g</h4> -->
                    <h3 class="text_pr" name="quantity" id="title_Quantite">Quantity</h3>
                    <div class="quantity buttons_added">      
                        <input type="button" value="-" class="minus" name="minus">
                        <input type="number" step="1" min="1" max="" name="stock" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                        <input type="button" value="+" class="plus" name="plus">
                    </div>
                    <h2 class="text_pr" name="Prix_unitaire"><?php echo $row["prix"] ."DH" ?></h2>
                    <?php       
                        if (isset($_SESSION['idClient'])) { 
                    ?>
                        <a href='shipping.php?action=buyNow&idProduit=<?php echo $row["idProduit"] ; ?>' class='btn_pr btn_pr'>BUY NOW</a>
                    <?php }
                        else{
                            echo "<a href='login.php' class='btn_pr btn_pr'>BUY NOW</a>";
                        }
                    ?>
                    <!-- <a href="bag.php?action=add&Code_P=<?php// echo  $row["Code_P"]?>" name="add_to_cart" class="btn_pr "> ADD TO CART<a> -->
                    <a><input type="submit" value="Add to Cart"  class="btn_pr"  />
                </div>
            </div>
        </div>
        <div class="container my-5">
            <h2 class="text-center my-5 titel_des">DESCRIPTION</h2>
            <h4 class="text-left my-4">
                <?php echo $row["description"]  ?>
            </h4>
            <!-- <h4 class="text-center my-5">
                Mild formula: natural gemstones, dermatologically tested.
            </h4> -->
        </div>
    </form>
    <?php include 'footer.html' ?>
    
</body>
</html>