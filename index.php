<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/signin.css">

</head>
<body>
  
<div class="signing-form">
  <form action="" method="post">
    <div class="form-header">
      <h2>Вход</h2>
      <p> to Friends</p>
    </div>hhhhhhhhhhhhhhhhhhhhhhhhhhhhyj
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="email" placeholder="введите email" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="">Пароль</label>
      <input type="password" class="form-control" name="pass" placeholder="пароль" autocomplete="off" required>
    </div>
    <div class="small">Забыл пароль? <a href="forgot_pass.php">Нажмите сюда</a></div><br>
    <div class="form-group">
      <button type="submit"  class="btn btn-primary btn-block-lg" name="sign_in">Войти</button>
    </div>
  <?php include("signin_user.php"); ?> 
  </form>
  <div class="text-center small" style="color:blueviolet">Нет аккаунта? <a href="signup.php">Создай</a> </div>
</div>
</body>
</html>