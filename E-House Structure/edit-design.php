<?php

include "db_conn.php";
session_start();

$username=$_SESSION['username'];
$get_id="SELECT id_person from accounts where username='$username'";

$res=mysqli_query($conn,$get_id);

if(mysqli_num_rows($res)>0)
{

    $row=mysqli_fetch_assoc($res);
    $id_person=(int)$row['id_person'];


}


$sql_designs="SELECT * FROM designs WHERE id_person='$id_person'";

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save']))
{
  $id_design=$_POST['save'];

  echo $id_design;

 
    $u_price=$_POST['fprice'];
    $u_area=$_POST['farea'];
    $u_bed_room=$_POST['fbedroom'];
    $u_living_room=$_POST['flivingroom'];
    $u_kids_room=$_POST['fkidsroom'];
    $u_gust_room=$_POST['fgustroom'];
    $u_kitchen=$_POST['fkitchen'];
    $u_garage=$_POST['fgarage'];
    $u_bathroom=$_POST['fbathroom'];
    $u_balcony=$_POST['fbalcony'];
    $u_garden=$_POST['fgarden'];
    $u_city=$_POST['fcity'];

    $sql_update = "UPDATE designs
    SET price='$u_price', area='$u_area', bed_room='$u_bed_room',
    kids_room='$u_kids_room', gust_room='$u_gust_room', living_room='$u_living_room',
    bathroom='$u_bathroom', balcony='$u_balcony', kitchen='$u_kitchen',
    garage='$u_garage', garden='$u_garden', city='$u_city'
    WHERE id_design='$id_design'";
      
      if(mysqli_query($conn,$sql_update)===true)
      {
        echo "done";
      }
      else
      {
      echo mysqli_error($conn);
      }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {

  $id_design = $_POST['delete'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
  
  $id_design = $_POST['delete'];
  $sql_delete = "DELETE FROM designs WHERE id_design = '$id_design'";
  
mysqli_query($conn,$sql_delete);  

}
}

?>



<!DOCTYPE html>
<html>
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/edit-design-style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">

    <title>Edit Desgin</title>

    
</head>


    <body>

    <div class="designs"> 
     
    <!-- صناديق التصاميم -->
     <?php 


      $result=mysqli_query($conn,$sql_designs);
      if(mysqli_num_rows($result)>0)
      {
          while($row = mysqli_fetch_assoc($result)) {


              
          // تخزين البيانات من قواعد البيانات في متغيرات
             
              $id=$row['id_design'];
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
              

  
echo


"<form  action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='post'>

<div class='card'>
        
<img src='designs/$image' >

<div class='row'>

    <div>
      <label>Price :</label>
      <input class='input-box' id='price' type='number' name='fprice' value=$price>JOD
    </div>

    <div>
      <label>Area :</label>
      <input class='input-box' id='area' name='farea' type='number' value=$area>M
    </div>

</div>

<div class='row'>
    
    <div>
      <label> Bed Rooms :</label>
      <input class='input-box' id='bed_room' name='fbedroom' type='number' value=$bed_room> 
    </div>
    
    <div>
      <label> Living Room :</label>
        <select class='select-box' id='living_room' name='flivingroom' >
      
        <option value='' ".($living_room == '' ? 'selected' : '')."></option>
        <option value='North' ".($living_room == 'North' ? 'selected' : '').">North</option>
        <option value='East' ".($living_room == 'East' ? 'selected' : '').">East</option>
        <option value='South' ".($living_room == 'South' ? 'selected' : '').">South</option>
        <option value='West' ".($living_room == 'West' ? 'selected' : '').">West</option>
      </select>

    </div>

</div>

<div class='row'>

    <div>
      <label> Kids Rooms : </label>
        <input class='input-box' id='kids_room' name='fkidsroom' value=$kids_room>
    </div>

    <div>
      <label> Gust Room : </label>
        <select class='select-box' id='gust_room' name='fgustroom'  >
          <option value='' ".($gust_room == '' ? 'selected' : '')."></option>
          <option value='North' ".($gust_room == 'North' ? 'selected' : '').">North</option>
          <option value='East' ".($gust_room == 'East' ? 'selected' : '').">East</option>
          <option value='South' ".($gust_room == 'South' ? 'selected' : '').">South</option>
          <option value='West' ".($gust_room == 'West' ? 'selected' : '').">West</option>
        </select>
    </div>

</div>

<div class='row'>
    
  <div>
      <label> Bathrooms :</label>
      <input class='input-box' id='bathroom' name='fbathroom' value=$bathroom>
  </div>
  
  <div>
    <label> Kitchens :</label> 
    <input class='input-box' id='kitchen' name='fkitchen' value=$kitchen> 
  </div>

</div>

<div class='row'>

    <div>
      <label>Balcony :</label>
      <input class='input-box' id='balcony' name='fbalcony' value=$balcony>
    </div>

    <div>
      <label>Garages :</label>
      <input class='input-box' id='garage' name='fgarage' value=$garage> 
    </div>

</div>

<div class='row'>
  <div>
    <label>Gardens :</label>
    <input class='input-box' id='garden' name='fgarden' value=$garden> 
  </div>

  <div>
    <label>City :</label>
      <select name='fcity' class='select-box' id='city' class='select-item input-item'>
            <option value='' " . ($city == '' ? 'selected' : '') . "></option>
            <option value='Amman' " . ($city == 'Amman' ? 'selected' : '') . ">Amman</option>
            <option value='Al-Zarqa' " . ($city == 'Al-Zarqa' ? 'selected' : '') . ">Al-Zarqa</option>
            <option value='Al-Balqaa' " . ($city == 'Al-Balqaa' ? 'selected' : '') . ">Al-Balqaa</option>
            <option value='Ajloun' " . ($city == 'Ajloun' ? 'selected' : '') . ">Ajloun</option>
            <option value='Al-Mafraq' " . ($city == 'Al-Mafraq' ? 'selected' : '') . ">Al-Mafraq</option>
            <option value='Irbid' " . ($city == 'Irbid' ? 'selected' : '') . ">Irbid</option>
            <option value='Jarash' " . ($city == 'Jarash' ? 'selected' : '') . ">Jarash</option>
            <option value='Aqaba' " . ($city == 'Aqaba' ? 'selected' : '') . ">Aqaba</option>
            <option value='Al-karak' " . ($city == 'Al-karak' ? 'selected' : '') . ">Al-karak</option>
            <option value='Maan' " . ($city == 'Maan' ? 'selected' : '') . ">Maan</option>
            <option value='Madaba' " . ($city == 'Madaba' ? 'selected' : '') . ">Madaba</option>
            <option value='Al-Tafila' " . ($city == 'Al-Tafila' ? 'selected' : '') . ">Al-Tafila</option>
            <option value='Maan' " . ($city == 'Maan' ? 'selected' : '') . ">Maan</option>

      </select>
  </div>

</div>

<div class='continer-buttons'>
  <button type='submit' value='$id' name='delete'>Delete</button>
  <button type='submit' value='$id' name='save'>Save</button> 
</div>

</div>
        
        </form>";
        
          }
        };
?>
</div>   

</body>
</html>
