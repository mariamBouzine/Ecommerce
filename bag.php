<?php 

   session_start();
   require_once("conx.php");
   $db_new= new DB();
    if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["stock"])) {
                $productByCode = $db_new->runQuery("SELECT * FROM produit WHERE idProduit='" . $_GET["idProduit"] . "'");
                $itemArray = array($productByCode[0]["idProduit"]=>array(
                    'libelle'=>$productByCode[0]["libelle"], 
                    'idProduit'=>$productByCode[0]["idProduit"], 
                    'stock'=>$_POST["stock"], 
                    'prix'=>$productByCode[0]["prix"], 
                    'image'=>$productByCode[0]["image"]));
                
                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["idProduit"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode[0]["idProduit"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["stock"])) {
                                        $_SESSION["cart_item"][$k]["stock"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["stock"] += $_POST["stock"];
                                }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
		    }	
		break;
            case "remove":
                if(!empty($_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["idProduit"] == $k)
                            unset($_SESSION["cart_item"][$k]);				
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                    }
                }
            break;
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <?php include 'navbar.php' ?>
    <div class="container">
            <h1 class="title_bag">MY SHOPPING CART</h1>
            <!------------------------------ cart table -------------------------->
            <div class="table_bg container mt-4">
            <?php 
                if(isset($_SESSION["cart_item"])){
                    $total_quantity = 0;
                    $total_price = 0;
            ?>
                <table class="table table-sm ">
                    <tbody>
                    <tr>
                        <th colspan="2">PRODUCT</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">SUBTOTAL</th>
                        <th style="width: 30px;" scope="col"></th>
                    </tr>
                    
                    <?php
                        // if(isset($_SESSION["cart-item"]))
					    // {
                            // $total_quantity = 0;
                            // $total_price = 0;
                            foreach($_SESSION["cart_item"] as $item){
                                $item_price = $item["stock"] * $item["prix"];
					?>
                        <tr>
                            <td colspan="2">
                            <div class="PRODUCT">
                                <img class="img_cart" src="<?php echo "products/". $item["image"]  ?>" alt="">
                                <h5 class="PRICE_SUBTOTAL name_prd"><?php echo $item["libelle"]; ?></h5>
                            </div>
                            </td>
                            <td>
                            <div class="QUANTITY">
                                <button class="btn_x"><img class="img_minus" src="img/minus-sign.png" alt=""></button>
                                <input type="number" class="Quantité" onkeyup="subTotale1(this.value)" min="1" max="100"  name="stock" value="<?php echo $item["stock"]; ?>" class="input_quantity">
                                <button class="btn_x"><img class="img_minus" src="img/plus (1).png" alt=""></button>
                            </div>
                            </td>
                            <td><h5 class="PRICE_SUBTOTAL"><?php echo $item["prix"] . " DH"; ?></h5>
                            <input type="hidden" class='iprice' name="total" value = <?php echo $item['prix']?> /></td>
                            
                            <td><h5 class="PRICE_SUBTOTA total_ALL"><?php echo number_format($item_price,2) ." DH"; ?></h5></td>
                            <td><a href="bag.php?action=remove&idProduit=<?php echo $item["idProduit"]; ?>" class="btn_x" onclick="return confirm('Are you sure?')"><img src="img/delete.png" class="fa-regular fa-circle-xmark"/></a></td>
                        </tr>
                    <?php
                            $total_quantity += $item["stock"];
                            $total_price += ($item["prix"]*$item["stock"]);
                            }
                        // }
                        ?>
                    </tbody>
                </table>
                <?php
                    } 
                ?>
            </div>
            <script>
                var price = document.getElementsByClassName('iprice');
                var total_ALL_product = document.getElementsByClassName('total_ALL');   
                function subTotale1(str){
                    var quantity = document.getElementsByClassName('Quantité');
                    if(str.lengh == 0){
                        document.getElementsByClassName('total_ALL').innerHTML = (price.value) * (total_ALL_product); 
                        return;
                    }else{
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                for (let i = 0; i < price.length; i++) {
                                    total_ALL_product[i].innerText =  this.responseText;;
                                }
                            }
                        };
                        xmlhttp.open("GET","bag.php?q="+str,true);
                        xmlhttp.send();
                    }
                }
               
                // function subTotale(){
                //         var quantity = document.getElementsByClassName('Quantité');
                //     for (let i = 0; i < price.length; i++) {
                //         total_ALL_product[i].innerText =  (price[i].value)*(quantity[i].value);
                        
                //     }
                // }
                subTotale();
            </script>
                <!--------------------------- total table --------------------------------->
            <div class="total_bg mt-5 ">
            <table class="table_total text-center mt-5">
                <tr>
                <th>TOTAL:</th>
                <td class="total_all_bag"><?php
                    if(isset($_SESSION["cart_item"])){
                     echo number_format($total_price, 2)." DH"; 
                    }
                    ?></td>
                </tr>
            </table>
            <button class="btn_pr btn_Pay mt-3">PAY</button>
            <p class="accept mt-4">WE ACCEPT:</p>
            <div class=" img_Accept">
                <img class="img_accept" src="img/mastercard (1).png" alt="">
                <img class=" img_accept" src="img/paypal_1 (1).png" srcset="">
                <img class="img_accept" src="img/visa.png" alt="">
                <img class="img_accept" src="img/maestro.png" alt="">
            </div>
        </div>
    </div>
    <?php include 'footer.html' ?>
</body>
</html> 