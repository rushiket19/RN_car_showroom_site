<?php
    session_start();
    $name_error='';
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
        if(empty($_POST['customer_name']) || empty($_POST['password'])){
            $error = "Some fields may be empty";
        }
        else{
            $Cus_name=$_POST['customer_name'];
            $Cus_pass=$_POST['password'];
            $Address=$_POST['address'];
            
            $sql_u = "SELECT * FROM customer WHERE Cus_name='$Cus_name'";
            $res_u = mysqli_query($con,$sql_u);
            if (mysqli_num_rows($res_u) > 0) {
                $name_error = "Sorry... username already taken"; 	
            }
            else if($Cus_name!="" && $Cus_pass!="")
            {
                $sql="insert into customer values('$Cus_name','$Cus_pass','$Address')";
                if($con->query($sql))
                {
                    echo "data stored";
                    header('location:LoginCustomer.php'); 
                }
            }
        }
    }
 
?>

<html>
    <head>
        <link rel="stylesheet" href="css/creg.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer Registration</title>
    </head>
    <body>
        <div class="form">
            <form action="RegCustomer.php" method="post">
            
                <h1 class="info">Customer name</h1>
                    <br><input type="text" name="customer name" placeholder="Enter Name">
                <h1 class="info">Password</h1>
                    <br><input type="password" name="password" placeholder="Enter Password">
                <h1 class="info">Address</h1>
                    <br><input type="text" name="address" placeholder="Enter Address"><br>  
                <div class="input">
                    <button type="submit" name="submit" class="btn-info">Register</button>
                </div>
                <!-- Error Message -->
                <span><?php echo $name_error; ?></span>
            </form>
        </div>
    </body>
</html>