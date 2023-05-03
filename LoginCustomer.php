<?php
    session_start();
    $error=''; //Variable to Store error message;
    if(isset($_POST['submit'])){
        if(empty($_POST['user']) || empty($_POST['pass'])){
            $error = "Username or Password is Invalid";
        }
        else
        {
            //Define $user and $pass
            $user=$_POST['user'];
            $pass=$_POST['pass'];
            //Establishing Connection with server by passing server_name, user_id and pass as a patameter
            $conn = mysqli_connect("localhost", "root", "",);
            //Selecting Database
            $db = mysqli_select_db($conn, "car showroom");
            //sql query to fetch information of registerd user and finds user match.
            $query = mysqli_query($conn, "SELECT * FROM customer WHERE BINARY Cus_Pass= BINARY '$pass' AND BINARY Cus_Name= BINARY '$user'");
            
            $rows = mysqli_num_rows($query);
            if($rows == 1){
                $_SESSION['uname']=$user;
                header('location: chome.php'); // Redirecting to other page
            }
            else
            {
                $error = "Username or Password is Invalid";
            }
            mysqli_close($conn); // Closing connection
        }
    }
 
?>
 
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <style>
        
        .login{
            width:369px;
            margin:50px auto;
            font-family: "Audiowide", sans-serif;
            border-radius:30px;
            border:2px solid #ccc;
            padding:10px 40px 25px;
            margin-top:250px; 
        }
        input[type=text], input[type=password]{
            width:99%;
            padding:10px;
            margin-top:8px;
            border:1px solid #ccc;
            padding-left:5px;
            font-size:16px;
            font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
        }
        input[type=submit]{
            width:100%;
            font-family: "Audiowide", sans-serif;
            background-color:#2583e8;
            color:#fff;
            border:2px solid #06F;
            padding:10px;
            font-size:50px;
            cursor:pointer;
            border-radius:5px;
            margin-bottom:15px; 
        }
    </style>
</head>
<body>
    <div class="login">
    <h1 align="center">RN's Car Shop</h1>
    <form action="" method="post" style="text-align:center;">
    <input type="text" placeholder="Username" id="user" name="user"><br/><br/>
    <input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
    <input type="submit" value="Login" name="submit">
    <!-- Error Message -->
    <span><?php echo $error; ?></span>
</body>
</html>