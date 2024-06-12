<?php 
include("include/connection.php");

  if(isset($_POST['sign_up'])){
  $name = htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
  $pass = htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
  $email = htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
  $country = htmlentities(mysqli_real_escape_string($con,$_POST['user_country']));
  $sex = htmlentities(mysqli_real_escape_string($con,$_POST['user_sex']));
  $rand = rand(1,2);

  if($name ==''){
    echo "<script>alert('We cant not verify your name')</script>";
}
if(strlen($pass)<8){
  echo"<script>alert('Пароль должен быть не меньше 8 символов')</script>";
  exit();
}
$check_email="select * from users where user_email='$email'";
$run_email= mysqli_query($con,$check_email);

$check = mysqli_num_rows($run_email);
if($check==1){
  
  echo "<script>alert('Email уже занят,попробуйте еще раз')</script>";
  echo "<script>window.open('signup.php','_self')</script>";
  exit();
}
if($rand == 1)
    $profile_pic = "image/юз2.png";
  else if($rand ==2)
    $profile_pic = "image/юз1.jpg";

    $insert = "insert into users(user_name,user_pass,user_email,user_profile,user_country,user_sex) values('$name','$pass','$email','$profile_pic','$country','$sex')";
    
    $query = mysqli_query($con,$insert);
    if($query){
      echo"<script>alert('Поздравляю $name,ваш аккаунт успешно создан')</script>";

      echo"<script>window.open('index.php','_self'</script>";
    }
    else{
      echo"<script>alert('Registration Failed,try again')</script>";
      echo"<script>alert('signup.php','_self')</script>";
    }

}
?>