<?php

include 'db_conn.php';

// احضار كل الحسابات 
$sql_user="SELECT * FROM accounts where type_account='user'";
$sql_archticts="SELECT * FROM accounts where type_account='architect'";

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove']))
{

$id = $_POST['remove'];
  $sql_del_account = "DELETE FROM accounts WHERE id_person = '$id'";
  
mysqli_query($conn,$sql_del_account); 

$sql_del_designs = "DELETE FROM designs WHERE id_person = '$id'";
mysqli_query($conn,$sql_del_designs); 

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--For File Css-->
    <link rel="stylesheet" href="styles/admin-style.css">
<!--For Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">

    <title>Admin</title>
</head>

<body>
    
<h1>Admin </h1>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<fieldset class="architect_session"> 
    <legend>Archticts :</legend>

    <table>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>City</th>
            <th>Remove</th>
        </tr>

        <?php

$result=mysqli_query($conn,$sql_archticts);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result)) {
 
       // $id_person=$row['id_perosn'];
       $id_p=$row['id_person'];

        $name=$row['name'];
        $username=$row['username'];
        $birthday=$row['birthday'];
        $gender=$row['gender'];
        $phone=$row['phone'];
        $city=$row['city'];

     echo "   <tr>
            <td>$name</td>
             <td>$username</td>
             <td>$birthday</td>
            <td>$gender</td>
            <td>$phone</td>
            <td>$city</td>
            <td><button type='submit' value='$id_p' name='remove'>Remove</button></td>
        </tr>
        ";
 
    }
}



        ?>

    </table>
</fieldset>

<fieldset class="user_session"> 
    <legend>Users :</legend>

    <table>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>City</th>
            <th>Remove</th>
        </tr>

        <?php

$result=mysqli_query($conn,$sql_user);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result)) {
 
       // $id_person=$row['id_perosn'];

       $id_p=$row['id_person'];

        $name=$row['name'];
        $username=$row['username'];
        $birthday=$row['birthday'];
        $gender=$row['gender'];
        $phone=$row['phone'];
        $city=$row['city'];

     echo "   <tr>
            <td>$name</td>
             <td>$username</td>
             <td>$birthday</td>
            <td>$gender</td>
            <td>$phone</td>
            <td>$city</td>
            <td><button type='submit' value='$id_p' name='remove'>Remove</button></td>
        </tr>
        ";
 
    }
}



        ?>

    </table>
</fieldset>


<!--<fieldset> 
    <legend>Designs :</legend>

    <table>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>City</th>
            <th>Remove</th>
        </tr>

    </table>
</fieldset>-->
</form>
</body>
</html>