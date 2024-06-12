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
  <title>Настройки аккаунта</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/find_pep.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div class="row">
  <div class="col-sm-2">
  </div>
  <?php $user = $_SESSION['user_email'];
  $get_user = "select * from users where user_email='$user'";
  $run_user = mysqli_query($con,$get_user);
  $row = mysqli_fetch_array($run_user);

  $user_name =$row['user_name'];
  $user_pass =$row['user_pass'];
  $user_email =$row['user_email'];
  $user_profile =$row['user_profile'];
  $user_country =$row['user_country'];
  $user_sex =$row['user_sex'];
  ?>

  <div class="col-sm-8">
    <form action="" method="post" enctype="multipart/form-data">
      <table class="table table-bordered table-hover">
        <tr align="center">
          <td colspan="6" class="active"><h2>Редактирование аккаунта</h2></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Изменить  имя</td>
        <td>
          <input type="text" name="u_name" class="form_control" required value="<?php 
          echo $user_name;?>"/>
        </td>
        </tr>
        <tr><td></td><td><a  class="btn btn-default" style="text-decoration:none;font-size: 
        15px;" href="upload.php "><i class="fa fa-user" aria-hidden="true"></i>Изменить фото</a></td></tr>

        <tr>
          <td style="font-weight:bold;">Изменить email</td>
          <td>
            <input type="email" name="u_email" class="form-control" required value="<?php echo $user_email;?>">
          </td>
        </tr>
        <tr>
          <td style="font-weight:bold">Изменить страну</td>
        <td>
        <select class="form-control" name="u_country" required >
      <option><?php echo $user_country?></option>
        <option >Russia</option>
        <option >USA</option>
        <option >France</option>
        <option >UK</option>
      </select>
        </td>
        </tr>
        <tr>
          <td style="font-weight:bold">Изменить пол</td>
        <td>
        <select class="form-control" name="u_sex" required >
      <option><?php echo $user_sex?></option>
        <option >Мужской</option>
        <option >Женский</option>
      </select>
        </td>
        </tr>
        <tr>
          <td style="font-weight: bold;">Изменить пароль </td>
          <td>
            <button type="button" class="btn btn-default" data-toggle="modal"
            data-target="#myModal">Забыл пароль</button>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="recovery.php?id=<?php echo $user_id;?>" method="post" id="f">
      <strong>Как зовут твоего друга</strong>
<textarea class="form-contol" cols="83" rows="4" name="content" placeholder="Кто"></textarea><br>
<input type="submit" class="btn btn-default" name="sub" value="Submit" style="width: 100px;"><br><br>
<pre>Ответьте на вопрос выше<br>пароль.</pre>
<br><br>
    </form>
<?php
if(isset($_POST['sub'])){
  $bfn = htmlentities($_POST['content']);
  if($bfn ==''){
    echo "<script>alert('please enter something.')</script>";
    echo "<script>window.open('account_settings.php','_self')</script>";
    exit();
  }
   else{
    $update ="update  users set forgotten_answer='$bfn' where user_email='$user'";
    $run = mysqli_query($con,$update);
    if($run){
      echo "<script>alert('Работаем....')</script>";
      echo "<script>window.open('account_settings.php','_self')</script>";
    }
    else{
      echo "<script>alert('Ошибка')</script>";
      echo "<script>window.open('account_settings.php','_self')</script>";
    }
   }
}
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>
          
        </tr>
        <tr><td></td><td><a href="change_password.php" class="btn btn-default" style="text-decoration:none;font-size:15px;">
        <i class="fa fa-key fa-fw" aria-hidden="true">
        </i>Поменять пароль</td></tr>
        <tr align="center">
          <td colspan="6">
            <input type="submit" value="Обновить" name="update" class="btn btn-info">
          </td>
        </tr>
      </table>
    </form>
    <?php 
    if(isset($_POST['update'])){
      $user_name = htmlentities($_POST['u_name']);
      $email =htmlentities($_POST['u_email']);
      $u_sex = htmlentities($_POST['u_sex']);
      $u_country= htmlentities($_POST['u_country']);

      $update = "update users set user_name ='$user_name',user_email='$email',
      user_country = '$u_country', user_sex = '$user_sex' where user_email='$user'";

      $run = mysqli_query($con,$update);
      if($run){
        echo "<script>window.open('account_settings.php','_self')</script>";
      }
    }
    ?>
  </div>
  <div class="col-sm-2"></div>
</div>  

</body>
</html>
<?php } ?>