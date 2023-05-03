<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .sidenav {
        font-family:"Audiowide", sans-serif;
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        }

        .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }

        .sidenav .closebtn {
        position: absolute;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car selling website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />   
    <link rel="stylesheet" href="css/explore.css">

</head>
<body>

    <!-- header section starts -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>R</span>N</a>
        <nav class="navbar">
            <a href="dhome.php">Home</a>
            <a href="addcar.php">Add</a>
            <a href="#services">Services</a>
            <a href="#contact">contact</a>
        </nav>
        Logged in as <?php echo $_SESSION['dealer']; ?>
    </header>
    <br>
    <br>
    <br>
    <div id="mySidenav" class="sidenav">
        <a href="#"></a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Newly Added Cars</a>
        <a href="#type1">Coupe</a>
        <a href="#type2">Sports</a>
        <a href="#type3">Super</a>
        <a href="#type4">S U V</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <span class="fas fa-times" id="close-login-form"></span>

    <section class="home" id="home">
        <div id="login-btn">
            <div class="eg">Browse Available Cars</div>
        </div>
    </section>
        
    <section class="vehicles" id="vehicles">
        <h2 id ="#" class="heading">Newly Added Cars</h2><br><br>
        <div class='format'>
        <div>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = ""; 
                $database = "car showroom";


                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                $sql = "SELECT * FROM vehicle where deal_name='{$_SESSION['dealer']}'";
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
                            $_SESSION['id']=$row['veh_id'];
                            echo "
                                <div class='format'>
                                    <img src='{$url}' width='500'><br>
                                    <div class='content'>
                                    <h3>{$model}</h3>
                                    <p>Dealer : {$dname}</p>
                                    <div class='price'> <span>price : </span> {$price} </div>
                                        <p>
                                            
                                            <span class='fas fa-circle'></span> {$type}
                                            <span class='fas fa-circle'></span> {$fueltype}
                                            <span class='fas fa-circle'></span> {$mileage}
                                        </p>
                                        <a href='delete.php' class='btn'>remove</a>
                                    </div>
                                </div>
                                <br>";
                        }
                }
            ?>
        </div>
        </div>
    </section>
    
    <section class="vehicles" id="vehicles">

        <h2 id="type1" class="heading">Coupe</h2>

        <div class='format'>
        <div>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = ""; 
                $database = "car showroom";


                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                $sql = "SELECT * FROM vehicle WHERE veh_type='Coupe' and deal_name='{$_SESSION['dealer']}'";
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
                                        
                                        <span class='fas fa-circle'></span> {$type}
                                        <span class='fas fa-circle'></span> {$fueltype}
                                        <span class='fas fa-circle'></span> {$mileage}
                                    </p>
                                    <a href='delete.php' class='btn'>remove</a>
                                </div>
                            </div>";
                        }
                }
                else{
                    echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
                
                }
            ?>
        </div>
        
    </section>

    <section class="vehicles" id="vehicles">

        <h2 id="type2" class="heading">Sports</h2>

        <div class='format'>
        <div>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = ""; 
                $database = "car showroom";


                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                $sql = "SELECT * FROM vehicle WHERE veh_type='Sports' and deal_name='{$_SESSION['dealer']}'";
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
                                <img src='{$url}' width='500'><br>
                                <div class='content'>
                                <h3>{$model}</h3>
                                <p>Dealer : {$dname}</p>
                                <div class='price'> <span>price : </span> {$price} </div>
                                    <p>
                                        
                                        <span class='fas fa-circle'></span> {$type}
                                        <span class='fas fa-circle'></span> {$fueltype}
                                        <span class='fas fa-circle'></span> {$mileage}
                                    </p>
                                    <a href='delete.php' class='btn'>remove</a>
                                </div>";
                        }
                }
                else{
                    echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
                
                }
            ?>
        </div>

    </section>

    <section class="vehicles" id="vehicles">

        <h2 id="type3" class="heading">Super</h2>

        <div class='format'>
        <div>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = ""; 
                $database = "car showroom";


                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                $sql = "SELECT * FROM vehicle WHERE veh_type='Super'and deal_name='{$_SESSION['dealer']}'";
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
                                <img src='{$url}' width='500'><br>
                                <div class='content'>
                                <h3>{$model}</h3>
                                <p>Dealer : {$dname}</p>
                                <div class='price'> <span>price : </span> {$price} </div>
                                    <p>
                                        
                                        <span class='fas fa-circle'></span> {$type}
                                        <span class='fas fa-circle'></span> {$fueltype}
                                        <span class='fas fa-circle'></span> {$mileage}
                                    </p>
                                    <a href='delete.php' class='btn'>remove</a>
                                </div>";
                        }
                }
                else{
                    echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
                
                }
            ?>
        </div>

    </section>

    <section class="vehicles" id="vehicles">

        <h2 id="type4" class="heading">S U V</h2>

        <div class='format'>
        <div>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = ""; 
                $database = "car showroom";


                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                $sql = "SELECT * FROM vehicle WHERE veh_type='SUV' and deal_name='{$_SESSION['dealer']}'";
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
                                <img src='{$url}' width='500'><br>
                                <div class='content'>
                                <h3>{$model}</h3>
                                <p>Dealer : {$dname}</p>
                                <div class='price'> <span>price : </span> {$price} </div>
                                    <p>
                                        
                                        <span class='fas fa-circle'></span> {$type}
                                        <span class='fas fa-circle'></span> {$fueltype}
                                        <span class='fas fa-circle'></span> {$mileage}
                                    </p>
                                    <a href='delete.php' class='btn'>remove</a>
                                </div>";
                        }
                }
                else{
                    echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
                
                }
            ?>
        </div>

    </section>
</body>

</html>