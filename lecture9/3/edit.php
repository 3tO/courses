<?php
// Задаємо заголовок сторінки.
$page_title = 'Add new article';

require('base/header.php');

// Якщо на сторінку зайшов НЕ редактор, тоді даємо у відповідь статус 403 та пишемо повідомлення.
if (!$editor) {
  header('HTTP/1.1 403 Unauthorized');
  print 'Доступ заборонено.';
  // Підключаємо футер та припиняємо роботу скрипта.
  require('base/footer.php');
  exit;
}

// Підключення БД, адже нам необхідне підключення для створення статті.
require('base/db.php');

// Робимо запит до БД, вибираємо статтю по параметру ГЕТ.
try {
  $stmt = $conn->prepare('SELECT id, title, short_desc, full_desc, timestamp FROM content WHERE id = :id');
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

// Якщо ми отримали дані з ПОСТа, тоді обробляємо їх та вставляємо.
if (isset($_POST['submit'])) {

  try {
    $stmt = $conn->prepare('UPDATE content SET title=:title, short_desc=:short_desc, full_desc=:full_desc, timestamp=:timestamp WHERE id = :id');

    $stmt->bindParam(':id', $_POST['id']);
    // Обрізаємо усі теги у загловку.
    $stmt->bindParam(':title', strip_tags($_POST['title']));

    // Екрануємо теги у полях короткого та повного опису.
    $stmt->bindParam(':short_desc', htmlspecialchars($_POST['short_desc']));
    $stmt->bindParam(':full_desc', htmlspecialchars($_POST['full_desc']));

    // Беремо дату та час, переводимо у UNIX час.
    $date = "{$_POST['date']}  {$_POST['time']}";
    $stmt->bindParam(':timestamp', strtotime($date));
    // Виконуємо запит, результат запиту знаходиться у змінні $status.
    // Якщо $status рівне TRUE, тоді запит відбувся успішно.
    $status = $stmt->execute();

  } catch(PDOException $e) {
    // Виводимо на екран помилку.
    print "ERROR: {$e->getMessage()}";
    // Закриваємо футер.
    require('base/footer.php');
    // Зупиняємо роботу скрипта.
    exit;
  }

  // При успішному запиту перенаправляємо користувача на сторінку перегляду статті.
  if ($status) {
    // За допомогою методу lastInsertId() ми маємо змогу отрмати ІД статті, що була вставлена.
    header("Location: article.php?id={$_POST['id']}");
    exit;
  }
  else {
    // Вивід повідомлення про невдале додавання матеріалу.
    print "Запис не був змінений.";
  }
}
?>
<!-- Пишемо форму, метод ПОСТ, форма відправляє данні на цей же скрипт. -->
<form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="POST">

  <div class="field-item">
    <label for="id">ID <?php print $article['id']; ?></label>
  </div>

  <div class="field-item">
    <label for="title">Заголовок</label>
    <input type="text" name="title" id="title" value="<?php print $article['title']; ?>" required maxlength="255">
  </div>

  <div class="field-item">
    <label for="short_desc">Короткий зміст</label>
    <textarea name="short_desc" id="short_desc" required maxlength="600"><?php print $article['short_desc']; ?></textarea>
  </div>

  <div class="field-item">
    <label for="full_desc">Повний зміст</label>
    <textarea name="full_desc" id="full_desc" required><?php print $article['full_desc']; ?></textarea>
  </div>

  <div class="field-item">
    <label for="date">День створення</label>
    <input type="date" name="date" id="date" value="<?php print date('d-m-Y ', $article['timestamp']); ?>" required value="<?php print date('Y-m-d')?>">
    <label for="time">Час створення</label>
    <input type="time" name="time" id="time"value="<?php print date('G:i', $article['timestamp']); ?>" required value="<?php print date('G:i')?>">
  </div>

  <input type="submit" name="submit" value="Зберегти">
  <input  type="hidden" name="id" value="<?php print $article['id']; ?>" required>

</form>

<?php
// Підключаємо футер сайту.
require('base/footer.php');
?>
