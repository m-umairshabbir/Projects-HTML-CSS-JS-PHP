<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallify | HomePage</title>
    <link rel="stylesheet" href="./HomeStyle.css">
    <link rel="stylesheet" href="./Images_Pages/Gallery.css">
</head>
<body>
    <div class="navbar">
        <div class=".center">
            <div >
                <div class="logo"><a href="./Home.html">
                    <img src="/LOgo/download.png" alt="">
                </a></div>   
        </div>    
    </div>
    <div class="corner">
        <div class="effect"> <a  href="./About.php">
            <img src="/Contact/Icons/address-card-solid.svg" alt="">About Us</a></div>
        <div class="effect"> <a  href="./About.php">
            <form action="logout.php"method="post">
            <button type="submit" name="logout">logout</button></a></div>
            </form>
       
        <div class="effect"> <a  href="./contact.php">
            <img src="/Contact/Icons/address-card-solid.svg" alt="">Contact Us</a></div>
        
    </div>
        </div>
        <div class="bar">
            <section class="tags">
           
                <div class="tag"><a href="./Images_Pages/Nature.html">Nature</a> </div>
                <div class="tag"><a href="./Images_Pages/Archietect.html">Archietect</a> </div>
                <div class="tag"><a href="./Images_Pages/Sports.html">Sports</a> </div>
                <div class="tag"><a href="./Images_Pages/Cars.html">Cars</a> </div>
                <div class="tag"><a href="./Images_Pages/technology.html">Technology</a> </div>
            </section>
            <div class="search">
                <input type="text" placeholder="Type Search Text here.....">
                <button>Search</button>
            </div>
        </div>
       
        <div class="gallery">
            <div class="pic h2">
                <img class="" src="./Images/Images/All/1.jpg" alt="">
            </div>
            <div class=" pic h2 w2">
                <img class="" src="./Images/Images/All/4.jpg" alt="">

            </div>
            <div class="pic " >
                <img class="" src="./Images/Images/Cars/1.jpg" alt="">

            </div>
            <div class="pic " >
                <img class="" src="./Images/Images/Sports/1.jpg" alt="">

            </div>
            <div class="pic w2 " >
                <img class="" src="./Images/Images/Technology/1.jpg" alt="">

            </div>
            <div class="pic h2 w2">
                <img class="" src="./Images/Images/Cars/10.jpg" alt="">

            </div>
            <div class="pic h2">
                <img class="" src="./Images/Images/Archietect/1.jpg" alt="">

            </div>
            <div class="pic ">
                <img class="" src="./Images/Images/Nature/11.jpg" alt="">

            </div>
             <div class="pic w3">
                <img class="" src="./Images/Images/Nature/12.jpg" alt="">

                </div>
             <div class="pic h2 w3 ">
                <img class="" src="./Images/Images/Cars/12.jpg" alt="">

            </div> 
            <div class="pic h2">
                <img class="" src="./Images/Images/Sports/2.jpg" alt="">

           </div>
           <div class="pic h2">
            <img class="" src="./Images/Images/Technology/3.jpg" alt="">

        </div>
        <div class=" pic h2 w2">
            <img class="" src="./Images/Images/Nature/5.jpg" alt="">

        </div>
        <div class="pic " >
            <img class="" src="./Images/Images/Cars/16.jpg" alt="">

        </div>
        <div class="pic " >
            <img class="" src="./Images/Images/Technology/9.jpg" alt="">

        </div>
        <div class="pic w2 " >
            <img class="" src="./Images/Images/Sports/4.jpg" alt="">

        </div>
        <div class="pic h2 w2">
            <img class="" src="./Images/Images/Nature/6.jpg" alt="">

        </div>
        <div class="pic h2">
            <img class="" src="./Images/Images/Cars/13.jpg" alt="">

        </div>
        <div class="pic ">
            <img class="" src="./Images/Images/Technology/4.jpg" alt="">

        </div>
         <div class="pic w3">
            <img class="" src="./Images/Images/Cars/18.jpg" alt="">

            </div>
         <div class="pic h2 w3 ">
            <img class="" src="./Images/Images/All/12.jpg" alt="">

        </div> 
        <div class="pic h2">
            <img class="" src="./Images/Images/Animals/1.jpg" alt="">

       </div>
       <div class="pic h2">
        <img class="" src="./Images/Images/Cars/10.jpg" alt="">

    </div>
    <div class=" pic h2 w2">
        <img class="" src="./Images/Images/Nature/4.jpg" alt="">

    </div>
    <div class="pic " >
        <img class="" src="./Images/Images/Technology/7.jpg" alt="">
    </div>
    <div class="pic " >
        <img class="" src="./Images/Images/Animals/12.jpg" alt="">

    </div>
    <div class="pic w2 " >
        <img class="" src="./Images/Images/Nature/5.jpg" alt="">

    </div>
    <div class="pic h2 w2">
        <img class="" src="./Images/Images/Nature/7.jpg" alt="">

    </div>
    <div class="pic h2">
        <img class="" src="./Images/Images/Archietect/7.jpg" alt="">

    </div>
    <div class="pic ">
        <img class="" src="./Images/Images/Nature/8.jpg" alt="">

    </div>
     <div class="pic w3">
        <img class="" src="./Images/Images/Technology/2.jpg" alt="">

        </div>
     <div class="pic h2 w3 ">
        <img class="" src="./Images/Images/Sports/5.jpg" alt="">

    </div> 
    <div class="pic h2">
        <img class="" src="./Images/Images/Animals/8.jpg" alt="">

   </div>
            </div>
</body>
</html>