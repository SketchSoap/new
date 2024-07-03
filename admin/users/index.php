<?php
session_start();
include "../../path.php";
include"../../app/controllers/users.php";
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
                <a href="<?php echo BASE_URL . "admin/users/create.php";?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/users/index.php";?>" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">

                <h2>Пользователи</h2>
                <div class="col-1">ID</div>
                <div class="col-2">Логин</div>
                <div class="col-3">Почта</div>
                <div class="col-2">Роль</div>
                <div class="col-4">Управление</div>

            </div>
            <?php foreach ($users as $key => $user): ?>
            <div class="row post">
                <div class="col-1"><?=$user['id'];?></div>
                <div class="col-2"><?=$user['username'];?></div>
                <div class="col-3"><?=$user['email'];?></div>
                <?php if($user['admin'] == 1): ?>
                <div class="col-2">Admin</div>
                <?php else: ?>
                <div class="col-2">User</div>
                <?php endif; ?>
                <div class="red col-2"><a href="edit.php?edit_id=<?=$user['id'];?>">Edit</a></div>
                <div class="del col-2"><a href="index.php?delete_id=<?=$user['id'];?>">Delete</a></div>
            </div>
            <?php endforeach; ?>

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
</html>