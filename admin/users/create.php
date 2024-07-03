<?php
    session_start();
    include "../../path.php";
    include "../../app/controllers/users.php";
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
    <link rel="stylesheet" href="../../assets/style/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<?php
include ("../../app/include/header-admin.php");
?>


<div class="container">
    <?php
    include ("../../app/include/sidebar-admin.php");
    ?>


        <div class="posts col-9">
            <div class="button row">
                <div class="button row">
                    <a href="<?php echo BASE_URL . "admin/users/create.php";?>" class="col-2 btn btn-success">Создать</a>
                    <span class="col-1"></span>
                    <a href="<?php echo BASE_URL . "admin/users/index.php";?>" class="col-3 btn btn-warning">Редактировать</a>
                </div>
            <div class="row title-table">
                <h2>Создание пользователя</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-mb-12  err">
                    <!--Вывод массива с ошибками-->
                    <?php include ("../../app/helps/errorinfo.php");?>
                </div>
                <form action="create.php" method="post">
                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Логин</label>
                        <input name="login" value="" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите логин">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Почта</label>
                        <input name="mail" value="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Введите свой адрес почты</div>
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Пороль</label>
                        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Повтарить пароль</label>
                        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2">
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input name="admin" class="form-check-input" value="1" type="checkbox"  id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Admin?
                            </label>
                        </div>
                        <button name="create-user" class="btn btn-primary" type="submit">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Footer START -->
<?php
include("../../app/include/footer.php");
?>
<!-- Footer END -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html><?php
