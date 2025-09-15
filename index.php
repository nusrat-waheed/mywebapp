<?php
include('./db/connection.php');

session_start();

if(isset($_POST['btnregister'])){

    $_name=$_POST['name'];
    $_email=$_POST['email'];
     $filename = $_FILES["upload"]["name"];
    $tempname = $_FILES["upload"]["tmp_name"];
    $folder = "./images/" . $filename;
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>&nbsp; Image uploaded successfully!</h3>";
    } else {
        echo "<h3>&nbsp; Failed to upload image!</h3>";
    }
    $query="insert into student(sname,semail,imageupload)values('$_name','$_email','$filename')";
   $stemnt= mysqli_query($conn, $query);
   if($stemnt){
echo "regsitered successfully";
   }
   else{
    echo "not register";
   }


}

$_SESSION['name']='ehtisham';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="name" id="">
    <input type="text" name="email" id="">
    <input type="file" name="upload" id="">
    <input type="submit" name="btnregister" id="">
</form>
</body>
</html>