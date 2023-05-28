
<?php
session_start();
include "db_conn.php";

// get username from session
$username=$_SESSION['username'];
//get all data from account using username
$sql="SELECT * FROM accounts where username='$username'";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

//store data in variable 
$id=$row['id_person'];
$name=$row['name'];
$user=$row['username'];
$birthday=$row['birthday'];
$gender=$row['gender'];
$phone=$row['phone'];
$city=$row['city'];
$new_img_name=$row['image'];
$type_account=$row['type_account'];



// if click save button 
if(isset($_POST['save']))
{
    //جلب جميع البيانات الخاصة في الصورة التي تم تحميلها 
    $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

    // في حال لا يوجد اخطاء في تحميل الصورة 
	if ($error === 0) {
	

        //  احضار نوع الملف المحمل
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 
        
            // الفحص اذا كان من ضمن الملفات المسموحة 
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc; // انشاء اسم فريد لعدم التكرار
				$img_upload_path = 'profile/'.$new_img_name;        // اعطاء المسار 
				move_uploaded_file($tmp_name, $img_upload_path);   // نقل الصورة 
                $image=$new_img_name;

				
			}else {
				$em = "You can't upload files of this type";
		        header("Location: profile.php?error=$em");
			}
	
	}

$new_username=$_POST['fusername'];

// فحص اذا كانت فارغة 
if(empty($_POST['fname']))
{
    $em = "Name Can't Empty !";

    header("Location: profile.php?error=$em");
}
else if(empty($_POST['fusername']))
{
    $em = "Username Can't Empty !";

    header("Location: profile.php?error=$em");
}
else if(empty($_POST['fbirthday']))
{
    $em = "Birthday Can't Empty !";

    header("Location: profile.php?error=$em");
}
else if(empty($_POST['fgender']))
{
    $em = "Gender Can't Empty !";

    header("Location: profile.php?error=$em");
}
else if(empty($_POST['fphone']))
{
    $em = "Phone Can't Empty !";

    header("Location: profile.php?error=$em");
}
else if(empty($_POST['fcity']))
{
    $em = "City Can't Empty !";

    header("Location: profile.php?error=$em");
}

else{

// تخزين البيانات في متغيرات 
    $name=$_POST['fname'];
    $user=$_POST['fusername'];
    $birthday=$_POST['fbirthday'];
    $gender=$_POST['fgender'];
    $phone=$_POST['fphone'];
    $city=$_POST['fcity'];

    // جملة تحديث المعلومات للحساب 
    $upd="UPDATE  accounts 
            SET name='$name',username='$user',birthday='$birthday'
            ,gender='$gender',phone='$phone',city='$city',image='$new_img_name'
            where id_person=$id";

    $result=mysqli_query($conn,$upd);

    if($result===true)
    {
        // تخزين البيانات الجديدة وتخزين اسم المستخدم في  السشن 
        $em = "Done";
        $_SESSION['username']=$user;
        header("Location: profile.php?error=$em");
    }
    else
    {
        $em = "User Name is Exist";
        header("Location: profile.php?error=$em");
    }

}

}

?>

        <!--********************* Html Code ************************ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--connect with file css-->
    <link rel="stylesheet" href="styles/profile-style.css">    
    
    <!-- for font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">


    <title>Profile</title>
</head>
<body>

<!--Animation  background -->
<svg class="sv" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" width="1200px" id="blobSvg" style="opacity: 1;">  
    <defs>             
    <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">       
    <stop offset="0%" style="stop-color: rgb(238, 205, 163);"></stop>  
    <stop offset="100%" style="stop-color: rgb(244, 241, 241);"></stop>      
    </linearGradient>                        </defs>       
    <path id="blob" fill="url(#gradient)" style="opacity: 1;">
    <animate attributeName="d" dur="4000ms" repeatCount="indefinite" values="M440.79254,295.90011Q393.21514,341.80021,357.53347,375.20746Q321.85181,408.61471,271.82218,427.01866Q221.79254,445.4226,171.55544,422.09659Q121.31834,398.77057,68.79254,358.84083Q16.26674,318.91109,38.15202,256.60373Q60.03731,194.29637,79.65586,134.88912Q99.27441,75.48187,157.19648,42.12622Q215.11855,8.77057,268.67782,50.11855Q322.2371,91.46653,362.16684,121.87761Q402.09659,152.2887,445.23326,201.14435Q488.36994,250,440.79254,295.90011Z;M440.89145,308.17188Q431.49014,366.34375,386.51892,408.54441Q341.5477,450.74507,280.86143,454.67188Q220.17516,458.59868,161.4046,439.6065Q102.63404,420.61431,74.24712,365.23068Q45.86019,309.84704,51.25164,251.37253Q56.64309,192.89803,94.98232,154.25946Q133.32155,115.62089,180.13528,103.21957Q226.94901,90.81826,286.5366,64.96012Q346.12418,39.10197,382.33594,90.33923Q418.5477,141.57648,434.42023,195.78824Q450.29277,250,440.89145,308.17188Z;M409,303.5Q416,357,378,402Q340,447,282,439Q224,431,187,398.5Q150,366,105.5,335.5Q61,305,45,245Q29,185,59,124.5Q89,64,152.5,40Q216,16,265,63.5Q314,111,383,115.5Q452,120,427,185Q402,250,409,303.5Z;M463.5,311.5Q441,373,396,422Q351,471,287,455Q223,439,179,411Q135,383,79,350Q23,317,51.5,258.5Q80,200,94,143.5Q108,87,162,49.5Q216,12,281.5,24.5Q347,37,383.5,89Q420,141,453,195.5Q486,250,463.5,311.5Z;M394.89432,291.86359Q379.96349,333.72718,354.5999,379.04899Q329.23631,424.37079,274.96542,439.22911Q220.69452,454.08742,185.59462,409.0927Q150.49472,364.09798,125.7075,328.96349Q100.92028,293.82901,59.42363,237.80355Q17.92698,181.77809,66.30163,137.5999Q114.67627,93.42171,168.36359,75.4145Q222.05091,57.4073,282.76369,51.5999Q343.47647,45.7925,374.93276,97.57444Q406.38905,149.35639,408.1071,199.67819Q409.82516,250,394.89432,291.86359Z;M440.79254,295.90011Q393.21514,341.80021,357.53347,375.20746Q321.85181,408.61471,271.82218,427.01866Q221.79254,445.4226,171.55544,422.09659Q121.31834,398.77057,68.79254,358.84083Q16.26674,318.91109,38.15202,256.60373Q60.03731,194.29637,79.65586,134.88912Q99.27441,75.48187,157.19648,42.12622Q215.11855,8.77057,268.67782,50.11855Q322.2371,91.46653,362.16684,121.87761Q402.09659,152.2887,445.23326,201.14435Q488.36994,250,440.79254,295.90011Z"></animate></path><path id="blob" fill="url(#gradient)" style="opacity: 1;"><animate attributeName="d" dur="3000ms" repeatCount="indefinite" values="M409,303.5Q416,357,378,402Q340,447,282,439Q224,431,187,398.5Q150,366,105.5,335.5Q61,305,45,245Q29,185,59,124.5Q89,64,152.5,40Q216,16,265,63.5Q314,111,383,115.5Q452,120,427,185Q402,250,409,303.5Z;M415.01911,310.8863Q439.5452,371.7726,388.0904,405.2945Q336.6356,438.8164,280.7726,433.452Q224.9096,428.08761,185.95759,398.74511Q147.00559,369.40261,129.05219,330.15471Q111.09878,290.9068,102.89189,247.863Q94.68499,204.8192,97.4315,140.3164Q100.17801,75.81361,160.4068,60.51771Q220.6356,45.22181,275.226,60.1356Q329.8164,75.04939,372.9534,109.3658Q416.0904,143.6822,403.29171,196.8411Q390.49301,250,415.01911,310.8863Z;M437.20545,311.82292Q441.89352,373.64584,380.77431,387.66608Q319.65509,401.68633,271.82754,416.34317Q224,431,184.22569,401.27431Q144.45139,371.54861,81.45601,344.74769Q18.46064,317.94676,58.87153,261.64584Q99.28242,205.34491,102.46413,144.38253Q105.64584,83.42014,164.05961,69.5926Q222.47338,55.76506,274.24769,69.97338Q326.02199,84.18171,376.989,109.95139Q427.95601,135.72107,430.23669,192.86053Q432.51737,250,437.20545,311.82292Z;M432.03478,297.56957Q398.46218,345.13914,356.36479,367.83696Q314.26739,390.53478,267.26739,423.085Q220.26739,455.63521,175.78826,421.28282Q131.30913,386.93043,88.83152,348.48609Q46.35391,310.04174,68.21174,256.28131Q90.06957,202.52087,95.17544,139.65457Q100.28131,76.78826,162.38717,74.23956Q224.49304,71.69087,270.52087,88.04326Q316.5487,104.39565,381.35239,113.97913Q446.15608,123.56261,455.88173,186.78131Q465.60739,250,432.03478,297.56957Z;M456.0768,303.76136Q418.13543,357.52271,379.98225,404.29316Q341.82907,451.0636,284.01817,433.65772Q226.20727,416.25185,163.99091,418.54046Q101.77456,420.82907,62.72047,368.86953Q23.66638,316.90999,61.99091,261.65772Q100.31545,206.40545,118.97771,163.62635Q137.63998,120.84725,179.51817,86.26136Q221.39637,51.67547,267.19818,81.83773Q313,112,367.68455,125.86045Q422.36911,139.7209,458.19364,194.86045Q494.01817,250,456.0768,303.76136Z;M409,303.5Q416,357,378,402Q340,447,282,439Q224,431,187,398.5Q150,366,105.5,335.5Q61,305,45,245Q29,185,59,124.5Q89,64,152.5,40Q216,16,265,63.5Q314,111,383,115.5Q452,120,427,185Q402,250,409,303.5Z"></animate></path></svg>



    <div class="profile">

    <!-- display if find error -->
    <?php if (isset($_GET['error'])): ?>
		<p class="error"><?php echo $_GET['error']; ?></p>
	<?php endif ?>


<h1>Profile</h1>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<div class="image_session">
        <img src="profile/<?php echo $new_img_name?>"  id="my-image" class="image-profile" >
        <input type="file"  class="btn-upload-image"id="my-file-input"  name="my_image">
</div>


<!--القسم التي يحتوي كل بيانات الحساب  -->
<div class="information">

<!--عرض اسم    -->

    <div>
        <label for=""> Name :</label>
        <input name="fname" value="<?php echo $name?>" class="input-item" >
    </div>

<!--عرض اسم المستخدم   -->
   
    <div>
        <label for=""> Username :</label>
        <input name="fusername" value="<?php echo $user?>" class="input-item" >
    </div>
    
<!--عرض تاريخ الميلاد  -->

    <div>
        <label for=""> Birthday :</label>
        <input type="date"name="fbirthday" value="<?php echo $birthday?>" class="input-item" >
    </div>

<!-- عرض الجنس للشخص -->

    <div>
        <label for=""> Gender :</label>
            <?php echo"   
         <select name='fgender' class='select-item input-item'>
            <option value='' " . ($gender == '' ? 'selected' : '') . "></option>
            <option value='Male' " . ($gender == 'Male' ? 'selected' : '') . ">Male</option>
            <option value='Female' " . ($gender == 'Female' ? 'selected' : '') . ">Female</option>
            </select>
            "?>
    </div>

<!-- رقم الهاتف -->

    <div>
        <label for=""> Phone :</label>
        <input name="fphone" maxlength=10 value="<?php echo $phone?>" class="input-item" >
    </div>

    
<!-- عرض المدينة للشخص -->
    <div>
        <label for=""> City :</label>
    <?php echo" 
    <select name='fcity' class='select-item input-item'>
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

            </select>"?>
    </div>




</div>

<div class="contener-buttons">

    <a class="buttons"  onclick="removeReadOnly()">Edit</a>
    <button class="buttons" name="save" type="submit" id="save-btn" onclick="setReadOnly()">Save</button>

</div>

<!--display add design button -->

<?php 
if($type_account=="architect")
echo ' <div>
            <a href="add-design.php" id="btn-add-design">  Add Design </a>
        </div>';
?>
</form>

</div>

    
<script src="code/profile1.js"></script>
</body>
</html>