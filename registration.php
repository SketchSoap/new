<?php
include "path.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My blog</title>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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


	<!--  FORM -->
	<div style="text-align: center; display:none;  margin-top: 200px;
    font-size: 30px;" id="info"></div>
	<div class="container reg_form">

		<div id="form">
			<form class="row justify-content-center g-3" id="formlog">
				<h2>Форма регистрации</h2>

				<div class="mb-3 col-12 col-md-4">
					<label for="validationServer01" class="form-label">Имя</label>
					<input name="validationServer01" type="text" class="form-control" id="validationServer01" required>
					<div class="valid-feedback">
						Хорошо!
					</div>
					<div class="invalid-feedback">
						Заполните поле (Не менее 2х символов).
					</div>
				</div>
				<div class="w-100"></div>
				<div class="mb-3 col-12 col-md-4">
					<label for="validationServer02" class="form-label">Фамилия</label>
					<input name="validationServer02" type="text" class="form-control" id="validationServer02" required>
					<div class="valid-feedback">
						Хорошо!
					</div>
					<div class="invalid-feedback">
						Заполните поле (Не менее 3х символов).
					</div>
				</div>
				<div class="w-100"></div>
				<div class="mb-3 col-12 col-md-4">
					<label for="validationServer03" class="form-label">Отчество</label>
					<input name="validationServer03" type="text" class="form-control" id="validationServer03">

					<div class="valid-feedback">
						Хорошо!
					</div>
					<div class="invalid-feedback">
						Заполните поле (Не менее 3х символов).
					</div>
					<div id="passwordHelpBlock" class="form-text">
						Не обязательно для заполнения
					</div>
				</div>
				<div class="w-100"></div>
				<div class="mb-3 col-12 col-md-4">
					<label for="validationServer04" class="form-label">Почта</label>
					<input name="validationServer04" type="email" class="form-control" id="validationServer04" aria-describedby="emailHelp" required>
					<div id="emailHelp" class="form-text"></div>
				</div>

				<div class="w-100"></div>
				<div class="mb-3 col-12 col-md-4">
					<label for="validationServer05" class="form-label">Пароль</label>
					<input name="pass-first" type="password" id="validationServer05" class="form-control" aria-labelledby="passwordHelpBlock" required>
					<div class="" id="passwordStrength"></div>
					<div id="passwordHelpBlock" class="form-text">
						Ваш пароль должен состоять из 8-20 символов, содержать буквы и цифры и не должен содержать пробелов, специальных символов или эмодзи.
					</div>
				</div>
				<div class="w-100"></div>
				<div class="mb-3 col-12 col-md-4">
					<label for="validationServer06" class="form-label">Повторить пароль</label>
					<input name="pass-second" type="password" class="form-control" id="validationServer06" required>
					<div class="" id="passwordStrength2"></div>
				</div>

				<div class="w-100"></div>
				<div class="mb-3 col-12 col-md-4">

					<button id="btn" type="submit" class="btn btn-secondary" name="button-reg">Зарегистрироваться</button>
					<a href="log.php">Войти</a>
				</div>
			</form>
		</div>

	</div>
	<!-- END FORM -->
</body>
<script src="assets/js/users/registration.js"></script>

</html>