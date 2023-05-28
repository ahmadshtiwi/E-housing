<?php
session_start();

include 'db_conn.php';

//عرض الاخطاء عند الصندوق 
$er_incorrect=$er_username=$er_password="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

$username=isset($_POST['fusername'])?$_POST['fusername']:"";
$password=isset($_POST['fpassword'])?$_POST['fpassword']:"";

if(empty($username))
    $er_username="Can't username empty";
else if(empty($password))
    $er_password="Can't password empty";
else if($username=="admin"&&$password=="admin")
{
    header("Location:admin.php");
}

else{

// احضار اسم المستخدم وكلمة المرور ومقارنتهم 

    $query = "SELECT * FROM accounts WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);

        if($row['username']==$username&&$row['password']==$password)
        {
            $_SESSION['username']=$username;
            header("Location:index.php");
            exit();
        }
        else
        {
            $er_incorrect="Username or password is incorret";
        }

    } 
    else
    {
        $er_incorrect="Username or password is incorret";
    }      

}
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--connect with file css-->

    <link rel="stylesheet" href="styles/login-style.css">

    <!-- for font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">
    
    <title>Log in </title>

</head>
<body>
    

<!--حاوية تحتوي على الصورة وصندوق تجيل الدخول-->
<div class="login-page">

<!--قسم الصورة -->
<div><img src="resource/l.jpg" alt=""></div>


<!--ثسم تسجيل الدخول-->
<div class="box-login">

    <h1>Log In </h1>

    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <span class="error"><?php echo $er_incorrect;?></span>


        <!--اسم المستخدم -->
        <label class="login-items"> Username :</label>
        <input type="text" name="fusername" >
        <span class="error"><?php echo $er_username;?></span>


        <!-- كلمة السر-->
        <label class="login-items"> password :</label>
        <input type="password" name="fpassword" >
        <span class="error"><?php echo $er_password;?></span>

        <!-- زر تسجيل الدخول 
        يعمل على نقل البيانات لقسم  البي اتش بي 
        -->
        <button type="submit" class="login-btn">Login</button>

<!-- رابط نقل الى صفحة تسجيل حساب -->
        <label >Don't Hava Account</label> <a href="sign-up.php">Sign Up</a>

    </form>
</div>


</div>

</body>
</html>