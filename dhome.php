<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dealer Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/stl.css">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- header section starts -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>R</span>N</a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="dealervehicles.php">vehicles</a>
            <a href="#services">services</a>
            <a href="#features">features</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>





        </nav>
        <div id="login-btn">
        <font size=5>Welcome Dealer<button class="btn"></font><?php echo $_SESSION['dealer']; ?></button>
            <i far fa-user></i>
        </div>
    </header>
    <!-- header section ends -->
    <!-- login form -->
    <div class="login-form-container">
        <span class="fas fa-times" id="close-login-form"></span>
        <form action="LoginCustomer.php">
            <input type="submit" value="Customer Login" class="btn">
        </form>
        <form action="LoginDealer.php">
            <input type="submit" value="Dealer Login" class="btn">
        </form>
        <p><font size=6>Dont have an account ?</font></p>
        <div class="dropdown">
            <button class="dropbtn">Register</button>
                <div class="dropdown-content">
                    <a href="RegCustomer.php">Customer Registration</a>
                    <a href="RegDealer.php">Dealer Registration</a>
                </div>
        </div>
        <button class="lobtn"><a href="logout.php">Logout</a></button>
    </div>


    <!-- home section starts here -->

    <section class="home" id="home">
        <h1 class="home-parallax" data-speed="-2">rn's cars shop </h1>
        <img class="home-parallax" data-speed="5"  src="image/home2.png" alt="">
    </section>







    <!-- home section ends here -->

<!-- icons section -->

<section class="icons-container">
    <div class="icons">
        <i class="fa-solid fa-plus"></i>
        <div class="content">
            <form method="POST" action="addcar.php">  
                <input type="submit" value="Add a new Car" class="btn"/>  
            </form>
        </div>
    </div>

    <div class="icons">
        <i class="fa-regular fa-square-minus"></i>
        <div class="content">
            <form method="POST" action="dealervehicles.php">  
                <input type="submit" value="Remove a Car" class="btn"/>  
            </form>
        </div>
    </div>
</section>








    <script src="js/scrpt.js"></script>
</body>

</html>