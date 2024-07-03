<?php
session_start();
include "path.php";
include "app/controllers/Users/User-login.php";
?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Font AWESOME -->
    <script src="https://kit.fontawesome.com/2ddc8d456c.js" crossorigin="anonymous"></script>
    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  </head>
  <body>

<?php
include("app/include/header.php");
 ?>

<!-- END HEADER -->


<!--  FORM -->
<div style="display: flex;">
<div class="col-5" style="z-index: -10;">
	<img style="width: 100%;" src="/assets/img/web/log.jpg">
</div>


<div class="col-7 reg_form">
			<form class="row justify-content-center" method="post" action="log.php">
				<h2>Авторизация</h2>
								<div class="mb-3 col-12 col-md-4 err">
									<?php include ("app/helps/errorinfo.php");?>
								</div>
						<div class="w-100"></div>
				<div class="mb-3 col-12 col-md-4">
			  <label for="formGroupExampleInput" class="form-label">Введите свой email</label>
			  			    <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>

				<div class="w-100"></div>
			  <div class="mb-3 col-12 col-md-4">
			    <label for="exampleInputPassword1" class="form-label">Пароль</label>
			    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
			  </div>

			  <div class="w-100"></div>
			  <div class="mb-3 col-12 col-md-4">
			  <button type="submit" class="btn btn-secondary" name="button-log">Войти</button>
			  <a href="registration.php">Регистрация</a>
			</div>
			</form>
</div>

</div>


<!-- END FORM -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>


