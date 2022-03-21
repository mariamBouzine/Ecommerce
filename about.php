<?php require 'conx.php'?>
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  href="Style.Css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'navbar.php' ?>
    <header >
        <div class="about_header">
            <h2 class="text-center" >ABOUT SHEENY</h2>
            <p class="text-center">lorem ipsum lorem ipsum lorem ipsum lorem</p>
        </div>
    </header>
    
    <main>
        <div class="content">
            <div class="cont_child">
                <div class="aboutContent">
                    <h2 class="about_title text-center">OUR STORY</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, explicabo earum obcaecati necessitatibus expedita asperiores laudantium modi, excepturi quae eveniet mollitia reiciendis. Voluptatum molestiae aliquid dignissimos! Atque facilis itaque consequatur. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic repellendus facilis nemo vitae porro laudantium earum quas eveniet. Pariatur quam harum necessitatibus iste animi neque inventore nostrum dolorum itaque. Quidem.</p>
                </div>
                <div id="2" class="aboutcontent ">
                    <img class="aboutImg" src="img/team.jpg" alt="">
                </div>
            </div>
            <div class="cont_child">
                <div class="aboutContent">
                    <h2 class="about_title text-center">OUR GOAL</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, explicabo earum obcaecati necessitatibus expedita asperiores laudantium modi, excepturi quae eveniet mollitia reiciendis. Voluptatum molestiae aliquid dignissimos! Atque facilis itaque consequatur. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic repellendus facilis nemo vitae porro laudantium earum quas eveniet. Pariatur quam harum necessitatibus iste animi neque inventore nostrum dolorum itaque. Quidem.</p>
                </div>
                <div id="2" class="aboutContent">
                    <img class="aboutImg" src="img/goal.jpg" alt="">
                </div>
            </div>
            <div class="cont_child">
                <div class="aboutContent">
                    <h2 class="about_title text-center">OUR QUALITY</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, explicabo earum obcaecati necessitatibus expedita asperiores laudantium modi, excepturi quae eveniet mollitia reiciendis. Voluptatum molestiae aliquid dignissimos! Atque facilis itaque consequatur. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic repellendus facilis nemo vitae porro laudantium earum quas eveniet. Pariatur quam harum necessitatibus iste animi neque inventore nostrum dolorum itaque. Quidem.</p>
                </div>
                <div id="2" class="aboutContent">
                    <img class="aboutImg" src="img/quality.jpg" alt="">
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.html' ?>
</body>
</html>