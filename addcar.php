<?php
    session_start();
    $con=new mysqli('localhost','root','','car showroom'); 
    if($con->connect_errno)
    {
        echo $con->connect_error;
        die();
    }
?>
<html>
    <head>
    <style>
        .sidenav {
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
        font-family:
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
    <link rel="stylesheet" href="css/add.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <title>Add Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Cars</title>
    </head>
    <body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="dhome.php">Home</a>
        <a href="dealervehicles.php">Vehicles</a>
        <a href="dealervehicles.php">Remove Cars</a>
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
    <div class="form">
        <form action="addcar.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label>Price</label>
                </div>
                <div class="col-75">
                    <input type="text" name="car_price" placeholder="Please enter price of the car..">
                </div>
            </div>
             <br>   
            <div class="row">
                <div class="col-25">
                    <label>Model</label>
                </div>
                <div class="col-75">
                    <input type="text" name="car_model" placeholder="Please enter model of the car..">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-25">
                    <label>Type</label>
                </div>
                <div class="col-75">
                    <input type="text" name="car_type" placeholder="Please enter the type of car..">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-25">
                    <label>Mileage</label>
                </div>
                <div class="col-75">
                    <input type="text" name="mileage" placeholder="Enter Mileage"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-25">
                    <label>Fueltype</label>
                </div>
                <div class="col-75">
                    <input type="text" name="fueltype" placeholder="Enter Fueltype"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group">
                    <div class="file">
                        <input class="form-control" type="file" name="uploadfile" value="" />
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit" class="font-effect-fire" value="Register">
                    </div>  
            </div>
            
            
        </form>
    </div>
    <?php

        if(isset($_POST['submit']) && isset($_FILES['uploadfile'])){
            
            $dealer=$_SESSION['dealer'];
            $veh_price=$_POST['car_price'];
            $veh_model=$_POST['car_model'];
            $veh_type=$_POST['car_type'];	
            $veh_mileage=$_POST['mileage'];	
            $fueltype=$_POST['fueltype'];

            $filename = $_FILES['uploadfile']['name'];
            $tempname = $_FILES['uploadfile']['tmp_name'];

            if($veh_price!="" && $veh_model!="" && $veh_type!="" && $veh_mileage!="" && $fueltype!="")
            {
                $folder = "./uploads/" . $filename;
                move_uploaded_file($tempname,$folder);
                $sql="insert into vehicle (deal_name,veh_price,veh_model,veh_type,veh_mileage,fueltype,vehimg) values('$dealer','$veh_price','$veh_model','$veh_type','$veh_mileage','$fueltype','$folder')";  
                if($con->query($sql))
                {
                    echo "data stored";
                }
                else
                {
                    echo "insert data fail";
                }
            }
            else
            {
                echo"Some fields may be Empty";
            }
        }
    ?>
    </body>
</html>