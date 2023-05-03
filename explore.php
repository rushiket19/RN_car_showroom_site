<?php
    session_start();
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "car showroom"; /* Database name */
    
    $con = mysqli_connect($host, $user, $password,$dbname);
?>
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
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
            <a href="chome.php">Home</a>
            <a href="#services">Services</a>
            <a href="#features">features</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>
        Logged in as <?php echo $_SESSION['uname']; ?>
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
        <a href="#cart">Cart</a>
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
                            $bdate=date("jS \of F Y");

                            echo "
                                <div class='format'>
                                    <form action='explore.php' method='post'>
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
                                        <input type='submit' value='Add to cart' name='add_to_cart' class='btn'>
                                    </div>
                                    </form>
                                </div>
                                <br>";
                        }
                }
                else{
                    echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
                
                }
                if(isset($_POST['add_to_cart'])) 
                {   //receive all input values from the form//
                    $cmodel = $model;   
                    $user = $_SESSION["uname"];
                    $status='Purchase Pending';
                    $sql_c= "SELECT veh_id from vehicle where veh_model = '".$cmodel."'";
                    $getmodelno= mysqli_query($con,$sql_c);
                    $numrows1= mysqli_num_rows($getmodelno);
                    if($numrows1 !=0)
                    {
                        while($row1=mysqli_fetch_assoc($getmodelno))
                        {
                            $dbmodelno=$row1['veh_id'];         
                        }
                    }
                    
                    $sql_u= "SELECT * from vehicle where veh_id = '".$dbmodelno."'";
                    $checkcar= mysqli_query($con,$sql_u);
                    $numrows3= mysqli_num_rows($checkcar);
                
                    if($numrows3 !=0)
                    {       
                        $sql="SELECT Cus_name from customer where Cus_name = '".$user."'";
                        $getuserid= mysqli_query($con,$sql);
                        $numrows2 =mysqli_num_rows($getuserid);
                        if($numrows2 !=0)
                        {
                            while($row2=mysqli_fetch_assoc($getuserid))
                            {
                                $dbuserid=$row2['Cus_name'];
                            }
                        }
                        $orderupdate = "INSERT into books (cus_name,veh_id,vehimg,price,status,bkdate) VALUES ('$dbuserid', '$dbmodelno','$url','$price','$status','$bdate')";
                        mysqli_query($con, $orderupdate);
                        $message = "Booking succesfull! ";
                        echo "<script type='text/javascript'>alert('$message');</script> action='explore.php'";
                    }
                    else
                    {
                        $message = "Oops ! the car you searching for is currently not available ! ";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }	
                }
            ?>
        </div>
        </div>
    </section>
    <br>
    <br>
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
                $sql = "SELECT * FROM vehicle WHERE veh_type='Coupe'";
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
                            <form action='explore.php' method='post'>
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
                                    <input type='submit' value='Add to cart' name='add_to_cart' class='btn'>
                                </div>
                            </form>";
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
                $sql = "SELECT * FROM vehicle WHERE veh_type='Sports'";
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
                            <form action='explore.php' method='post'>
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
                                    <a href='#' class='btn'>Add to Cart</a>
                                </div>
                            </form>";
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
                $sql = "SELECT * FROM vehicle WHERE veh_type='Super'";
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
                            <form action='explore.php' method='post'>
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
                                    <input type='submit' value='Add to cart' name='add_to_cart' class='btn'>
                                </div>
                            </form>";
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
                $sql = "SELECT * FROM vehicle WHERE veh_type='SUV'";
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
                            <form action='explore.php' method='post'>
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
                                    <input type='submit' value='Add to cart' name='add_to_cart' class='btn'>
                                </div>
                            </form>";
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