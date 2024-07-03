<?php
session_start();
include("path.php");
include "app/controllers/topics.php";
$post = selectPostFromPostWithUsersOnSingle('posts', 'users', $_GET['post']);

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

  </head>
  <body>

<?php
include("app/include/header.php");
 ?>

<!-- Блок main START-->
<div class="container">
		<div class="content row">
			<!-- Main Content -->
			<div class="main-content col-md-9 col-12">
				<h2><?php echo $post['title'];?></h2>
				<div class="single_post row">
					<div class="img col-12">
						<img src="<?= BASE_URL . 'assets/img/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="img-thumbnail">
					</div>
					<div class="info">
												<i class="far fa-user"><?php echo $post['username'];?></i>
												<i class="far fa-calendar"><?php echo $post['created_date'];?></i>
					</div>
					<div class="single_post_text col-12">
					<?php echo $post['content']; ?>
					</div>
				</div>
			</div>


			<!-- sidebar Content -->
			<div class="sidebar col-md-3 col-12">
				
				<div class="section search"> 
						<h3>Search</h3>
						<form action="#" method="post">
							<input type="text" name="search-term" class="text-input" placeholder="Search...">
						</form>
				</div>
				<div class="section topics">
					<h3>Категории</h3>
					<ul>
						<?php foreach($topics as $key => $topic):  ?>
							<li>
								<a href="<?= BASE_URL . 'category.php?id=' . $topic['id'];?>"><?= $topic['name']; ?></a>
							</li>
						<?php endforeach; ?>
					</ul> 
				</div>
			</div>
		</div>
	</div>
<!-- Блок main END-->


<!-- Footer START -->

<?php
include("app/include/footer.php");
?>

<!-- Footer END -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>