<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");
if(!isset($_SESSION['user_email'])){
header("location:index.php");
}
else{ 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Изменить фото профиль</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/find_pep.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
  .card{
    box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0,2);
    max-width: 400px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }
  .card img{
    height: 200px;
  }

.title {
  color:gray;
  font-size: 18px;
}
.button{
  border: none;
  outline: 0;
  display: inline-block;
  padding: 9px;
  color:white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
#update_profile{
  position: absolute;
  cursor: pointer;
  padding: 7px;
  margin-left: 1px;
  border-radius: 4px;
  color: white;
  background-color: #000;
}
label{
  padding: 7px;
  display: table;
  color: #fff;
}
input[type="file"]{
  display: none;
}
</style>
<body>

<?php 
$user = $_SESSION['user_email'];
$get_user = "select * from users where user_email='$user'";
$run_user = mysqli_query($con,$get_user);
$row = mysqli_fetch_array($run_user);

$user_name =$row['user_name'];
$user_profile =$row['user_profile'];
echo "
      <div class='card'>
      <img src='$user_profile'>
      <h1>$user_name</h1>
      <form method='post' enctype='multipart/form-data'>
    <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i>Select Profile
    <input type='file' name='u_image' size='60'>
    </label>
    <button id='button_profile' name='update'>&nbsp&nbsp&nbsp<i class='fa fa-heart' aria-hidden='true'></i> Update profile</button>
      </form>
      </div><br><br>
";


if(isset($_POST['update'])){

  $u_image =$_FILES['u_image']['name'];
  $image_tmp=$_FILES['u_image']['tmp_name'];
  $random_number = rand(1,100);
  if($u_image ==''){
    echo "<script>alert('please select profile')</script>";
    echo "<scipt>window.open('upload.php','_self')</help>";
    exit();
  }
  else{
move_uploaded_file($image_tmp,"image/$u_image.$random_number");
$update= "update users set user_profile='image/$u_image.$random_number' where user_email='$user'";
  $run = mysqli_query($con,$update);
  if($run){
    echo"<script>alert('your profile updated')</script>";
    echo "<script>window.open('upload.php','_self')</help>";

  }
  }
}
?>
</body>
</html>
<?php }?>