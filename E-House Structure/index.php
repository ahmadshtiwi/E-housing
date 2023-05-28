
<?php

session_start(); // start the session

include "db_conn.php";

//احضار اسم المستخدم 
$username=isset($_SESSION['username'])?$_SESSION['username']:"";

$sql_profile="SELECT * FROM accounts WHERE username='$username'";
$result=mysqli_query($conn,$sql_profile);

if(mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_assoc($result);
    $name=$row['name'];
    $my_image=$row['image'];
}
// احضار كل التصاميم 
$sql_design="SELECT * FROM designs";
// احضار كل الحسابات 
$sql_architect="SELECT * FROM accounts";




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--connect with file css-->

    <link rel="stylesheet" href="styles/index-style1.css">

    <!-- for font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">

    <title>E-House Structure</title>
    
</head>

<style>
    /*تستخدم للعناصر التي خارج الفلتر    */
    .is-hidden{
          display: none;

        }
    </style>
<body>
    

    <nav id="top">

<!-- logo  -->
        <img src="resource/logo.png" class="logo" alt="" srcset="">

<!-- قسم الروابط -->
        <ul>
            <li>  <a class="link-list"  href="#home">Home</a>  </li>
            <li> <a class="link-list" href="about-us.html">About Us</a> </li>
            <li>  <a class="link-list" href="contact.html">Contact</a> </li>

<!-- قسم الصورة الشخصية واسم الحساب -->
            
    <?php 
        // فحص اذا السشن يحتوي اسم مستخدم 
        // لا يحتوي فيتم اظهار رابط تسحيل دخول 
        if($username=="")
        {
            echo ' 
            <div class="login">
            <a href="login.php"> Login </a>
            </div> ';
        }

        else 
        { 
            // اذا يحتوي يتم عرض البيانات الاسم والصورة 
            echo 
            '<li>  
            <div class="login">
                <img src="profile/'.$my_image.'" class="image-profile">
                <div class="dropdown" >
                    <button onclick="myFunction()"  class="dropbtn">'.$username.'</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="custom.html">Custom Design</a>
                        <a href="logout.php">Log Out</a>
                    </div>
                </div>
            </div>
            </li> ';
        }
    ?>
        </ul>

    </nav>

    <!-- تضمين قسم الفلتر  في الصفحة--> 
<?php include('filter.php') ?>


<!-- this div content design and name architect -->

    <div id="home" class="container-item">


<!-- قسم التصاميم -->



<form class='' action='contact-with-eng.php' method='post'>

<div id="designs-container" class="design">
<span id="return"></span>
    <?php 

        $result=mysqli_query($conn,$sql_design);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result)) {

                // تخزين البيانات من قواعد البيانات في متغيرات
                $image=$row['image_design'];
                $id_person=$row['id_person'];
                $price=$row['price'];
                $area=$row['area'];
                $bed_room=$row['bed_room'];
                $kids_room=$row['kids_room'];
                $gust_room=$row['gust_room'];
                $living_room=$row['living_room'];
                $bathroom=$row['bathroom'];
                $balcony=$row['balcony'];
                $kitchen=$row['kitchen'];
                $garden=$row['garden'];
                $garage=$row['garage'];
                $city=$row['city'];
                
                echo "

    
                <div class='card'>
        
                <img src='designs/$image' >
               
                <div class='row'>
                    <div><label>Price :</label><span id='price'>$price </span>JOD</div>
                    <div><label>Area :</label><span id='area'> $area </span>M<sup>2</sup></div>
                </div>
                
                <div class='row'>
                    <div><label> Bed Rooms : <span id='bed_room'>$bed_room</span> </label></div>
                    <div><label> Living Room : <span id='living_room'>$living_room</span> </label></div>
                </div>
        
                <div class='row'>
                    <div><label> Kids Rooms : <span id='kids_room'>$kids_room</span> </label></div>
                    <div><label> Gust Room : <span id='gust_room'>$gust_room</span> </label></div>
                </div>
                
                <div class='row'>
                    <div><label> Bathrooms  : <span id='bathroom'>$bathroom</span> </label></div>
                    <div><label> Kitchens : <span id='kitchen'>$kitchen</span> </label></div>
                </div>
                <div class='row'>
                    <div><label>Balcony: <span id='balcony'>$balcony</span> </label></div>
                    <div><label>Garages : <span id='garage'>$garage</span> </label></div>
                </div>
            <div class='row'>
                <div><label>Gardens: <span id='garden'>$garden</span> </label></div>
                <div><label>City : <span id='city'>$city</span> </label></div>
            </div>
        
                <button type='submit' name='id' value='$id_person'>Contact with Engineer </button>
        
            </div>
                    
                    ";
            } // end while
        }
        else
        {
            echo "<h1> No Found Any Design</h1>";
        }

    ?>
    <a href="#return"><img class="image-home" src="resource/arrow-up.png"></a>

</div>
</form>

<!--اسماء المهندسيين -->


<div class="continer-archticts">      

<form action='design-for-archtict.php' method='post'>
 <div class='architect'>
    <?php 
    $result=mysqli_query($conn,$sql_architect);
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_assoc($result)) 
        {

            if($row['type_account']=='architect'||$row['type_account']=='company')
            {
                $id_person=$row['id_person'];
                $name=$row['name'];
                
                echo "
               
                <button type='submit' value='$id_person' name='id' class='link-architect'>$name</button>
                ";
            }

        }
    }?>
    </div>
    </form>

</div>

</div>
    



<!--كود الجافاسكربت -->
<script src="code/index.js"></script>



</script>

</body>
</html>
