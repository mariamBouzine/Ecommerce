
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg  Mynav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/LOGO.png" alt="logo" class="imgLogo" />
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <img src="img/menu.png" alt="navbar-toggler" class="imgLogo" />
            </button>
            <div class="collapse navbar-collapse " id="navbarText">
                <ul id="nav_ul" class="navbar-nav me-auto mb-2 mb-lg-0 list_nav txtNav">
                  <li class="nav-item ">
                    <a class="nav-link active txtNav" aria-current="page" href="index.php" >Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link txtNav" href="#form_product">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link txtNav" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link txtNav" href="#offers">Offers</a>
                  </li>
                </ul>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                    <?php 
                          if (isset($_SESSION['idClient'])) {
                          ?>
                            <a class='nav-link text-secondary' onclick="return confirm('Are you sure to logout?');" href='logout.php'><img src='img/connexion.png' alt='user' class='icon' id='connexion'  /></a>
                          <?php
                          }else{
                              echo "<a class='nav-link text-secondary'  href='login.php' ><img src='img/User.png' alt='user' class='icon'  id='user' /></a>";  
                          }
                          ?>
                     
                  </li>
                    <?php
                      // session_start();
                      if(!empty($_SESSION["cart_item"])) {
                        $cart_count = count(array_keys($_SESSION["cart_item"]));
                      ?>
                    <li>
                      <a class="nav-link text-secondary" href="bag.php"  >                      
                        <img src="img/bag.png" alt="Bag" class="icon" />
                        <span class="cart_count">
                            <?php echo $cart_count; ?>
                        </span>
                    </a></li>
                    <?php
                      }
                      else{
                        echo "<li>
                            <a class='nav-link text-secondary' href='bag.php'  >                      
                              <img src='img/bag.png' alt='Bag' class='icon' />
                          </a></li>";
                      }
                      ?>
                </ul>
              </div> 
        </div>
    </nav>

