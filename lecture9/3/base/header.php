<?php
// Початок буферу.
ob_start();
// Початок або продовження сесії.
session_start();
// Створюємо змінну $editor, у якій міститься інформація про роль користувача на сайті.
$editor = (bool) $_SESSION['login'];

// Якщо раніше заголовок сторінки не був заданий, тоді ми його задаємо.
if (!isset($page_title)) {
  $page_title = 'Blog site';
}

?>
<!-- Виводимо основну структуру сайту. -->
<!DOCTYPE html>
<html>
<head>
  <title><?php print $page_title; ?></title>
  <meta charset="utf-8">
  <!-- CSS files -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <link rel="stylesheet" href="im_js_css/styles.css" type="text/css">
</head>
<body>

 <!-- Будуємо меню сайту. -->
<div class="header" >
  <ul class="main-menu">
    <li><a href="/">Головна сторінка</a></li>
    <?php if ($editor): ?>
      <li><a href="/add.php">Додати статтю</a></li>
      <li><a href="/logout.php">Вихід</a></li>
    <?php endif; ?>
    <?php if (!$editor): ?>
     <!-- <span class="open_popup" rel="popup1" href="/login.php">первый popup</span> -->
      <li><a class="open_popup" rel="popup1" href="#">Вхід</a></li>
    <?php endif; ?>
  </ul>
</div>
