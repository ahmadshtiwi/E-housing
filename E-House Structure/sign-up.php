<?php
session_start();
include 'db_conn.php';

// متغيرات لتخزين البيانات
$name=$username=$password=$re_password=$phone=$city=$type_account=$gender=$birthday="";

// متغيرات لتحزين الاخطاء 
$er_name=$er_username=$er_password=$er_repassword=$er_phone=$er_city=$er_type_account="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

/*** احضار البيانات وتخزينها ** */

$type_account=$_POST['ftype-account'];
$city=$_POST['fcity'];
$name=isset($_POST['fname'])? valid_data($_POST['fname']):"";
$username=isset($_POST['fusername'])? valid_data($_POST['fusername']):"";
$password=isset($_POST['fpassword'])? valid_data($_POST['fpassword']):"";
$re_password=isset($_POST['fre-password'])? valid_data($_POST['fre-password']):"";
$phone=isset($_POST['fphone'])? valid_data($_POST['fphone']):"";
$birthday=isset($_POST['fbirthday'])? valid_data($_POST['fbirthday']):"";
$gender=isset($_POST['fgender'])? valid_data($_POST['fgender']):"";


/************ فحص اذا كان ادخال فارغ للبيانات  ********/


if ($_POST['fre-password']<>$_POST['fpassword']) 
    {
    $er_repassword="Password Not Match";
    }


   else  if(isset($_POST['signup']))
{

$query="SELECT username from accounts where username='$username'";
$result=mysqli_query($conn,$query);

// فحص اذا كان اسم المستخدم موجود من قبل 
    if(mysqli_num_rows($result) > 0)
    {   
        $er_username="The user name is found !"; 
    }
    else if(!empty($name) && !empty($username)&& !empty($password)&& !empty($phone) )
    {
        $sql="INSERT INTO accounts(name,username,password,birthday,gender,phone,city,type_account,image)
        VALUES ('$name','$username','$password','$birthday','$gender','$phone','$city','$type_account','icon.png')";
        
        if (mysqli_query($conn, $sql)) 
        {
            /** 
             * نجاح التخزين في قاعدة البيانات 
             * تخزين اسم المستخدم في ملف السشن 
             * انتفال الى الصفحة الرئيسية 
            */
            $er_name= "New record created successfully";
            $_SESSION["username"]=$username;
            header("Location:index.php");
            exit;
        } 
        else
        {
            $er_name="k".mysqli_error();
        }

    }
}
} 

function valid_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/signup-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">


    <title>Sign Up</title>
</head>

<body>
<div class="signup-page">

    <div>
        <img src="resource/l.jpg">
    </div>

    <div class="box-signup">

        <h1>Sign Up</h1> 
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<!--Name-->
            <label class="signup-items" > Name : <span class="start-requerd">*</span></label>
            
            <input required type="text" name="fname" class="box-item" value="<?php echo $name;?>">
            <span class="error"><?php echo $er_name;?></span>
<!--Username-->
            <label class="signup-items" > Username : <span class="start-requerd">* </span> <span class="error"><?php echo $er_username?></span></label>
           
            <input required type="text" name="fusername" class="box-item" 
            pattern="[a-zA-Z0-9_]{8,20}"
            value="<?php echo $username;?>">
            <span style="font-size:12px;" >  hint: first_last | firstlast</span>
<!--Password-->
            <label class="signup-items" > Password : <span class="start-requerd">*</span></label>
            
            <input required type="password" name="fpassword" class="box-item"
            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{8,}$"
            value="<?php echo $password;?>">
            <span style="font-size:12px;" >content : A-Z a-z 0-9  </span>

<!--Re-password-->           
            <label class="signup-items" > Re Password : <span class="start-requerd">*</span></label>

            <input  type="password"  name="fre-password" class="box-item" value="<?php echo $re_password;?>">
            <span class="error"><?php echo $er_repassword;?></span>

            
            <div class="g_f">

<!--Birthday-->               
                <div class="birthday">
                    <label class="signup-items" > Birthday : <span class="start-requerd"></span></label>
                    <input  type="date" name="fbirthday" class="box-item" value="<?php echo $birthday;?>">
                </div>

<!--Gender-->
                <div class="gender">
                    <label class="signup-items" > Gender :</label>
                    <select type="date" class="box-item" name="fgender" value="<?php echo $gender;?>">
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>



<!--Phone Number-->
            <label class="signup-items" > Phone Number : <span class="start-requerd">*</span></label>
            <input required type="text" class="box-item" minlength="10" maxlength="10" name="fphone" value="<?php echo $phone;?>">
            <span class="error"><?php echo $er_phone;?></span>
<!--City-->
            <label required class="signup-items"  >City :</label>
            <select name="fcity" class="box-item">
           
                <option value="">City</option>
                <option value="Amman">Amman</option>
                <option value="Al-Zarqa">Al-Zarqa</option>
                <option value="Al-Balqaa">Al-Balqaa</option>
                <option value="Ajloun">Ajloun</option>
                <option value="Al-Mafraq">Al-Mafraq</option>
                <option value="Irbid">Irbid</option>
                <option value="Jarash">Jarash</option>
                <option value="Aqaba">Aqaba</option>
                <option value="Al-karak">Al-karak</option>
                <option value="Maan">Maan</option>
                <option value="Madaba">Madaba</option>
                <option value="Al-Tafila">Al-Tafila</option>
            </select>
            <span class="error"><?php echo $er_city;?></span>

 <!--Type Account-->           
            <label class="signup-items"  >Type Account :</label>
            <select name="ftype-account" class="box-item">
          
                <option value="user">User</option>
                <option value="architect">Architect</option>
                
            </select>
            
            <span class="error"><?php echo $er_city;?></span>
<!-- زر تسجيل حساب -->
            <button  class="signup-btn" name="signup" type="submit">Sign Up</button>
            

        </form>

    </div>
</div>

</body>
</html>