<?php

$page_title = 'delete article';
// Підключаємо файл до БД, адже потрібно вибрнати дані.
require('base/db.php');
require('base/header.php');

if (!$editor) {
  header('HTTP/1.1 403 Unauthorized');

  print 'Доступ заборонено.';
  // Підключаємо футер та припиняємо роботу скрипта.
  require('base/footer.php');
  exit;
}

try {
  $stmt = $conn->prepare('SELECT id, title, short_desc FROM content WHERE id = :id');
  // Додаємо плейсхолдер.
  $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);	
  $stmt->execute();
  // Витягуємо статтю з запиту.
  $article = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  // Виводимо на екран помилку.
  print "ERROR: {$e->getMessage()}";
  // Закриваємо футер.
  require('base/footer.php');
  // Зупиняємо роботу скрипта.
  exit;
}


if (isset($_GET['submit'])) {
// Робимо запит до БД, видалємо статтю по параметру ГЕТ.
try {
  $stmt = $conn->prepare('DELETE FROM content WHERE id = :id');
  // Додаємо плейсхолдер.
  $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);	
  $stmt->execute();
} catch(PDOException $e) {
  // Виводимо на екран помилку.
  print "ERROR: {$e->getMessage()}";
  // Закриваємо футер.
  require('base/footer.php');
  // Зупиняємо роботу скрипта.
  exit;
} finally {    
    header("Location: /");
    exit;
}}

?>

<meta charset="utf-8">
<form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="GET">

  <div class="field-item">
    <label for="title"><?php print $article['title']; ?></label>

  </div>

  <div class="field-item">
    <label for="short_desc"><?php print $article['short_desc']; ?></label>
    
  </div>

  <input type="submit" name="submit" value="видалити">
  <input  type="hidden" name="id" value="<?php print $article['id']; ?>" required>

</form>

<?php
// Підключаємо футер сайту.
require('base/footer.php');
?>
