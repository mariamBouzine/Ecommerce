<?php 

    session_start();

    if (!isset($_SESSION['Code_C'])) {
        // header("Location: login.php");
    }
//////////////bag/////////////////////////
   

?>
<?php require 'conx.php'?>
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
    <header>
        <div class="headerimg">
            <img src="img/headerPIC.png" id="img_hreader">
            <p class="slogan">All the flavors of being a lady</p>
            <span class="miniSlog">Brighten your soul</span>
        </div>
    </header>
     <div class="container text-center my-5">
        <div class="row">
            <div class="col-lg-4 col-ms-12">
                <img src="img/mascara.png" alt="mascara" class="icon-category" />
                <h3 class="title">make-up</h3>
            </div>
            <div class="col-lg-4 col-ms-12">
                <img src="img/cream (1).png" alt="cream" class="icon-category" />
                <h3 class="title">make-up</h3>
            </div>
            <div class="col-lg-4 col-ms-12">
                <img src="img/cream.png" alt="cream" class="icon-category" />
                <h3 class="title">make-up</h3>
            </div>
        </div>
    </div>
    <h1 class="Beauty_Products">Face & Beauty Products</h1>
    <form method='post' action='' id="form_product">
        <div id="product_cont_parent ">
            <div id="product_cont"  >
                <?php
                    $SqlSelect = "SELECT * FROM `produit` LIMIT 0,6;";
                    $result = $conn->query($SqlSelect); 
                   // $SqlQty = "SELECT * FROM `produit` WHERE Quantité = 0;";
                    //   $result = mysqli_query($conn,"SELECT * FROM `produit` LIMIT 0,3");
                    //   while($row = mysqli_fetch_assoc($result)){
                    $row = $result -> fetch_assoc(); 
                    foreach ( $result as $row ) { 
                        
                    // while($row){        
                ?>
                    <div class="product ">
                        <h4 class="Title_Product"><?php echo $row["libelle"] ?></h4>
                        <h6 class="Price_Product"><?php echo $row["prix"]." "."DH"?></h6>
                        <img src="products/<?php echo $row["image"]?>" alt="error" class="products_photo"/><br>
                        <?php
                            if($row["stock"]==0){
                                echo "<a href='Product.php?action=add&idProduit=". $row['idProduit']. "'>    
                                        <input type='button' value=' SOLD OUT ' disabled class='btnAdd_soldOut' />
                                        </a>";
                            }else{
                                echo  "<a href='Product.php?action=add&idProduit=". $row['idProduit']. "''>    
                                    <input type='button' value=' ADD TO CART '  class='btnAdd' />
                                </a>";
                            }
                        ?>
                    </div>
                <?php
                   
                        }
                            // $conn->close();
                    ?>
            </div>
        </div>
        <p class="lead">Displayed <b class="shownLength">3</b> Of <b class="listLength">12</b> Results.</p>
        <div class="buttonToogle" ><a href="#product_cont" class="showMore" id="showMore">+ View More</a></div>
            
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
            $(function() {
                var increment = 3;
                var startFilter = 0;
                var endFilter = increment;
                var $this = $('#product_cont');
                var elementLength = $this.find('div').length;
                $('.listLength').text(elementLength);
                $('#showLess').hide();
                if (elementLength > 2) {
                    $('.buttonToogle').show();
                }
                $('#product_cont .product').slice(startFilter, endFilter).addClass('shown');
                $('.shownLength').text(endFilter);
                $('#product_cont .product').not('.shown').hide();
                $('.buttonToogle #showMore').on('click', function() {
                    if (elementLength > endFilter) {
                            startFilter += increment;
                            endFilter += increment;
                            $('#product_cont .product').slice(startFilter, endFilter).not('.shown').addClass('shown').toggle(500);
                            $('.shownLength').text((endFilter > elementLength) ? elementLength : endFilter);
                            if (elementLength <= endFilter) {
                                $(this).remove();
                                $('#showMore').hide();
                                // $('#showLess').show();
                                // $('.lead').hide();
                           }
                    }                
                });  
            });
        </script>
    </form>
    <div class="row">
        <div class="col-lg-6 col-ms-12  ">
            <img src="img/young-woman.jpg" alt="cream" class="back_Image_body" />
        </div>
        <div class="col-lg-6 col-ms-12  text-white div_body">
            <div class="textWomen">
                <p class=" ">invest on your SKIN.<BR>
                   it’s going to represent you for a long time</p>
            </div>
        </div>
    </div> 
    <h1 class="Beauty_Products">Face & Beauty Products</h1>
    <form method='post' action=''>
        <div id="product_cont_parent1" >
            <div id="product_cont1"  >
                <?php
                    $SqlSelect = "SELECT * FROM `produit` LIMIT 6,12;";
                    $result = $conn->query($SqlSelect); 
                    $row = $result -> fetch_assoc(); 
                    foreach ( $result as $row ) {    
                ?>
                    <div class="product" style="display: flex;">
                        <h4 class="Title_Product"><?php echo $row["libelle"] ?></h4>
                        <h6 class="Price_Product"><?php echo $row["prix"]." "."DH"?></h6>
                        <img src="products/<?php echo $row["image"]?>" alt="error" class="products_photo"/><br>
                        <?php
                            if($row["stock"]==0){
                                echo "<a href='Product.php?action=add&idProduit=". $row['idProduit']. "'>    
                                        <input type='button' value=' SOLD OUT ' disabled class='btnAdd_soldOut' />
                                        </a>";
                            }else{
                                echo  "<a href='Product.php?action=add&idProduit=". $row['idProduit']. "''>    
                                    <input type='button' value=' ADD TO CART '  class='btnAdd' />
                                </a>";
                            }
                        ?>
                    </div>
                <?php
                            }
                            // $conn->close();
                        ?>
            </div>
        </div>
        <p class="lead">Displayed <b class="shownLength">3</b> Of <b class="listLength">12</b> Results.</p>
        <div class="buttonToogle" ><a href="#product_cont1" class="showMore" id="showMore1">+ View More</a></div>
            
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
            $(function() {
                var increment = 3;
                var startFilter = 0;
                var endFilter = increment;
                var $this = $('#product_cont1');
                var elementLength = $this.find('div').length;
                $('.listLength').text(elementLength);
                $('#showLess').hide();
                if (elementLength > 2) {
                    $('.buttonToogle').show();
                }
                $('#product_cont1 .product').slice(startFilter, endFilter).addClass('shown');
                $('.shownLength').text(endFilter);
                $('#product_cont1 .product').not('.shown').hide();
                $('.buttonToogle #showMore1').on('click', function() {
                    if (elementLength > endFilter) {
                            startFilter += increment;
                            endFilter += increment;
                            $('#product_cont1 .product').slice(startFilter, endFilter).not('.shown').addClass('shown').toggle(500);
                            $('.shownLength').text((endFilter > elementLength) ? elementLength : endFilter);
                            if (elementLength <= endFilter) {
                                $(this).remove();
                                $('#showMore').hide();
                                // $('#showLess').show();
                                // $('.lead').hide();
                            }
                    }
                    
                });  
            });
        </script>
    </form>
    
    <?php include 'footer.html' ?>
</body>
</html>