<?php
session_start();
include"../../app/database/db.php";
include"../../app/controllers/posts.php";
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
                <a href="<?php echo BASE_URL . "admin/posts/create.php";?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/posts/index.php";?>" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Управление записями</h2>
                <div class="col-1">ID</div>
                <div class="col-5 ">Название</div>
                <div class="col-2">Автор</div>
                <div class="col-4">Управление</div>

            </div>
            <?php foreach ($postsADM as $key => $post):?>
                <div class="row post">
                    <div class="id col-1"><?=$key+1;?></div>
                    <div class="title col-5"><?=mb_substr($post['title'],0, 50, 'UTF-8') . '...'?></div>
                    <div class="author col-2"><?=$post['username'];?></div>
                    <div class="red col-1"><a href="edit.php?id=<?=$post['id'];?>">Edit</a></div>
                    <div class="del col-1"><a href="edit.php?delete_id=<?=$post['id'];?>">Delete</a></div>
                        <?php if($post['status']): ?>
                    <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">Unpublish</a></div>
                        <?php else: ?>
                    <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Publish</a></div>
                    <?php endif; ?>
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