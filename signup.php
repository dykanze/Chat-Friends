<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create account</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/signup.css">

</head>
<body>
  
<div class="signup-form">
  <form action="" method="post">
    <div class="form-header">
      <h2>Регистрация</h2>
      <p>to Friends</p>
    </div>
    <div class="form-group">
      <label for="">Имя</label>
      <input type="text" class="form-control" name="user_name" placeholder="Пример: Нео" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="">Пароль</label>
      <input type="password" class="form-control" name="user_pass" placeholder="пароль" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="user_email" placeholder="введите email" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="">Страна</label>
      <select class="form-control" name="user_country" required >
      <option disabled>Выберите страну</option>
        <option value>Россия</option>
        <option value>USA</option>
        <option value>France</option>
        <option value>UK</option>
      </select>
    </div>
    <div class="form-group">
      <label for="">Пол</label>
      <select class="form-control" name="user_sex" required >
       
        <option disabled>Выбери пол</option>
        <option value>Мужской</option>
        <option value>Женский</option>
      </select>
    </div> 
    <div class="form-group">
      <label class="checkbox-inline"><input type="checkbox" name="" required>  Я согласен <a href="#">Terms of Use </a>&amp;<a href="#"> Privacy Policy</a></label>
    </div>

    
    <div class="form-group">
      <button type="submit"  class="btn btn-primary btn-block-lg" name="sign_up">Зарегестрироваться</button>
    </div>
  <?php include("signup_user.php"); ?> 
  </form>
  <div class="text-center small" style="color:blueviolet">Уже есть аккаунт<a href="index.php">   Нажми сюда</a> </div>
</div>
</body>
</html>