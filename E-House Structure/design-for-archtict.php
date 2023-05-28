
<?php
include "db_conn.php";

$id =$_POST['id'];
$sql_designs="SELECT * FROM designs where id_person='$id'";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--For CSS  file-->
    <link rel="stylesheet" href="styles/design-for-archtict-style.css">

<!--For font-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">

    <title>Design</title>
</head>
<body>
    

<div class="designs">

 <form class='' action='contact-with-eng.php' method='post'>

<!--   عرض كل التصاميم الخاصة   -->
<?php 


        $result=mysqli_query($conn,$sql_designs);
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

 <button type='submit' class='button' name='id' value='$id_person'>Contact with Engineer </button>

</div>
     
     ";
            }
        }

        else
        {
            echo '<h1> The Archtict Not Have Designs </h1>';
        }

        ?>

</div>

</body>
</html>