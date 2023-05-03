<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .eg{
            font-size:50px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car selling website</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />   
    <link rel="stylesheet" href="css/stl.css">
    <link rel="stylesheet" href="css/explore.css">

</head>

<body>

    <!-- header section starts -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>R</span>N</a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#vehicles">vehicles</a>
            <a href="#services">services</a>
            <a href="#features">features</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>

        </nav>
        <div id="login-btn">
            <button class="btn">login</button>
            <i far fa-user></i>
        </div>
    </header>
    <!-- header section ends -->
    <!-- login form -->
    <div id="login" class="login-form-container">
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
    </div>


    <!-- home section starts here -->

    <section class="home" id="home">
        <h1 class="home-parallax" data-speed="-2">rn's cars shop </h1>
        <img class="home-parallax" data-speed="5"  src="image/home2.png" alt="">
        <a href="#vehicles" class="btn home-parallax" data-speed="7">explore car</a>

    </section>







    <!-- home section ends here -->

<!-- icons section -->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-home"></i>
        <div class="content">
            <h3>150+</h3>
            <p>parts stores</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>4770+</h3>
            <p>cars sold</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <div class="content">
            <h3>320+</h3>
            <p>happy clients</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>1500+</h3>
            <p>news cars</p>
        </div>
    </div>

</section>
<!-- icons section ends header -->
<section class="vehicles" id="vehicles">

    <h1 class="heading"> vehicles available</h1>
    <div class='format'>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $database = "car showroom";


            // Create a connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            $sql = "SELECT * FROM vehicle";
            $result = mysqli_query($conn, $sql);

            // Check for the database creation success
            if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $url = $row['vehimg'];
                        $model=$row['veh_model'];
                        $dname=$row['deal_name'];
                        $price=$row['veh_price'];
                        $type=$row['veh_type'];
                        $mileage=$row['veh_mileage'];
                        $fueltype=$row['fueltype'];

                        echo "
                            <div class='format'>
                                <img src='{$url}' width='500'><br>
                                <div class='content'>
                                <h3>{$model}</h3>
                                <p>Dealer : {$dname}</p>
                                <div class='price'> <span>price : </span> {$price} </div>
                                    <p>
                                        
                                        <i class='fa fa-circle' aria-hidden='true'></i> {$type}
                                        <i class='fa fa-circle' aria-hidden='true'></i> {$fueltype}
                                        <i class='fa fa-circle' aria-hidden='true'></i> {$mileage}
                                    </p>
                                    <button onclick='loginpls()' class='btn'><a href='#login' class='btn'>check out</a></button>
                                </div>
                            </div>
                            <br>";
                    }
            }
        ?>
    </div>
</section>
    <script>
        function loginpls() {
        alert("You need to login first!!");
        }
    </script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/scrpt.js"></script>
</body>

</html>