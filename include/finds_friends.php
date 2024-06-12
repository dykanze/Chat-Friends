<!DOCTYPE html>
<?php
session_start();
include("find_friends_function.php");
if(!isset($_SESSION['user_email'])){
header("location:index.php");
}
else{ 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Найти друзей</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/find_pep.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expend-sm bg-dark navbar-dark">
  <a class="nabvar-brand" href="#">
    <?php 
    $user=$_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user'";
    $run_user = mysqli_query($con,$get_user);
    $row = mysqli_fetch_array($run_user);
    
    $user_name = $row['user_name'];
    echo "<a  class='navbar-brand' href='../home.php?user_name=$user_name'>NeChat</a>";
    ?>
    <ul class="navbar-nav">
      <li><a style="color:white;text-decoration:none;font-size:20px;" 
      href="../account_settings.php">Настройки</a></li>
    </ul>
</a>
</nav><br>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form action="" class="search_form">
      <input type="text" name="search_query" placeholder="Poisk" autocomplete="off" required>
      <button class="btn" type="submit" name="search_btn">Поиск</button>
    </form>
  </div>
  <div class="col-sm--4">


  </div>
</div><br><br>

  <?php search_user(); ?>
</body>
</html>
<?php } ?>