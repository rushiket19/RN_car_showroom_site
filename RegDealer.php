<?php
    session_start();
    $error='';
    $con=new mysqli('localhost','root','','car showroom'); 
    if($con->connect_errno)
    {
        echo $con->connect_error;
        die();
    }
    else
    {
        echo "<p style:'color=red';>Database connected</p>";
    }
   if(isset($_POST['submit']))
    {
        if(empty($_POST['Dealer_name']) || empty($_POST['password'])){
            $error = "Some fields may be empty";
        }
        else{
            $Deal_name=$_POST['Dealer_name'];
            $Deal_pass=$_POST['password'];
            $Deal_Address=$_POST['address'];
            
            $sql_u = "SELECT * FROM dealer WHERE Deal_name='$Deal_name'";
            $res_u = mysqli_query($con,$sql_u);
            if (mysqli_num_rows($res_u) > 0) {
                $error = "Sorry... username already taken"; 	
            }
            else if($Deal_name!="" && $Deal_pass!="")
            {
                $sql="insert into dealer values('$Deal_name','$Deal_pass','$Deal_Address')"; 
                if($con->query($sql))
                {
                    echo "data stored";
                    header('location:LoginDealer.php'); 
                }
            }
        }
    }
 
?>

<html>
    <head>
        <link rel="stylesheet" href="css/dreg.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dealer Registration</title>
    </head>
    <body>
        <div class="form">
            <form action="RegDealer.php" method="post">
            
                <h1>Dealer name : </h1>
                    <br><input type="text" name="Dealer name" placeholder="Enter Name">
                <h1>Password : </h1>
                    <br><input type="password" name="password" placeholder="Enter Password">
                <h1>Address : </h1>
                    <br><input type="text" name="address" placeholder="Enter Address"><br>  
                <div class="input">
                    <button type="submit" name="submit" class="btn-info">Register</button>
                </div>
                <!-- Error Message -->
                <span><?php echo $error; ?></span>
            </form>
        </div>
    </body>
</html>
