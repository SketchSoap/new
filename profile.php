<?php
session_start();
// Запрет входа для уровеня доступа выше 3 (операторы и зарегестрированные пользователи)
if (!isset($_SESSION['id'])) {
    header('location:../../index.php');
}

include "path.php";
include "app/database/db.php";


?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check-on</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Font AWESOME -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2ddc8d456c.js" crossorigin="anonymous"></script>
    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/style/style.css">
    <!--	Font	-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Header START -->
    <?php
    include("app/include/header.php");
    ?>
    <!-- Header END -->
    <input id='id_user' type="hidden" value="<?= $_SESSION['id'] ?>">
    <div class="container">
        <div style="display: flex; margin-top: 50px;">
            <div class="section_one" style=" background-color: gray; padding: 50px; width: 30%;height: 400px;">
                <div style="text-align: center; border-bottom: 1px solid; margin-bottom: 30px;">Аватар</div>
                <div style="text-align: center; border: 1px solid; padding-bottom: 150px;">Блок с информацией, Права доступа, регистрация, активновсть, огранизация, должность и .т.д</div>
            </div>
            <div class="section_two" style="display: block; background-color: bisque; padding: 50px; width: 70%;">
                <div style="text-align: center; border-bottom: 1px solid; margin-bottom: 30px;">
                    <div class="top_block" style="display: flex; justify-content: space-around;">
                        <div> карточка Количество сотрудников</div>
                        <div>карточка количества оборудования</div>
                    </div>

                    ----------------------------------------
                    <div style="margin-bottom: 30px;" id='notifications'></div>
                    <?php if ($_SESSION['Access'] <= 3 && isset($_SESSION['id'])) : ?>
                    <form id="user_form">
                        <div class="input-group mb-3">
                            <input id="user_email" type="email" class="form-control" placeholder="Введите адрес почты" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Найти</button>
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                    </form>
                    <?php endif; ?>
                    <div style="display: none;" id="users_table"></div>
                    <div id="test"></div>
                </div>
                <div style="text-align: center; border: 1px solid; padding-bottom: 150px;">Вывод последних коментариев или ремонтов,ошибок</div>
            </div>
        </div>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
<script src="assets/js/users/profile.js"></script>
</html>