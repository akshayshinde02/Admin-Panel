<?php 
    require("Connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <link rel="stylesheet" type =  "text/css" href="mycss.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="login-form">
        <h2>Admin Login Pannel</h2>
        <form method="POST" >
        <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Admin name"  name="AdminName">
    </div>


    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" name="AdminPassword">
    </div>

    <button type="submit " name="Signin">Sign in </button>

    <div class="extra">
        <a href="#">forget Password</a>
        <a href="#">Cretate an Acoount</a>
    </div>
</form>
</div>

<?php 

if(isset($_POST['Signin']))
{
    $query ="SELECT * FROM `admin_login` WHERE 'Admin_Name'='$_POST[AdminName]' AND 'Admin_Password'='$_POST[AdminPassword]'";
    echo $query;

    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==0){
       session_start();
       $_SESSION["AdminLoginId"]=$_POST["AdminName"];
       header("location: Admin Panel.php");
    }
    else{
        echo "<script>alert('Incorrect Password');</script>";
    }
}
?>

</body>
</html>