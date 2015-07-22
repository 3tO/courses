<?php

// Підключаємо хедер сайту.
require('base/header.php');
// Підключаємо файл БД, адже нам необхідно вибрати статті.
require('base/db.php');

$user = array(
  // Логін, з яким можна зайти на сайт.
  'name' => 'admin',
  // пароль "123", але ми його не зберігаємо у відкритому вигляді, ми вписуємо тільки хеш md5.
  'pass' => '202cb962ac59075b964b07152d234b70',
);


// Якщо запис у користувача про сесію вже є, тоді пропонуємо йому розлогінитися.
// Тобто вийти з сайту.
/*if (!empty($_SESSION['login'])) {
  print 'Ви вже залоговані на сайті.';
  print '<a href="/logout.php">Вийти</a>';
}*/

// Якщо користувач відправляє форму, тоді аналізуємо дані з POST.
if (!empty($_POST['name']) && !empty($_POST['pass'])) {

  // Якщо доступи вірні, тоді робимо відповідний запис у сесії.
  if ($_POST['name'] == $user['name'] && md5($_POST['pass']) == $user['pass']) {
    $_SESSION['login'] = TRUE;
    // Направляємо користувача на головну сторінку.
    header('Location: /');
  }

}

try {
  // Вибираємо усі з необхідними полями статті та поміщаємо їх у змінну $articles.
  $stmt = $conn->prepare('SELECT id, title, short_desc, timestamp FROM content ORDER BY timestamp DESC LIMIT 0,10');
  $stmt->execute();
  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  // Виводимо на екран помилку.
  print "ERROR: {$e->getMessage()}";
  // Закриваємо футер.
  require('base/footer.php');
  // Зупиняємо роботу скрипта.
  exit;
}

?>
<!-- Вітальне повідомленя на головній сторінці. -->
<meta charset="utf-8">
<h1> Welcome to blog site!</h1>
<!-- Виводимо статті у тегах -->
<div class="articles-list">

  <?php if (empty($articles)): ?>
    <!-- У випадку, якщо статтей немає - виводимо повідомлення. -->
    Статті відсутні.
  <?php endif; ?>
  <?php foreach ($articles as $article): ?>
    <div class="article-item">
      
      <h2><a href="/article.php?id=<?php print $article['id']; ?>"><?php print $article['title']; ?></a></h2>

      <div class="description">
        <?php print $article['short_desc']; ?>
      </div>

      <div class="info">
        <div class="timestamp">
          <!-- Вивід відформатованої дати створення. -->
          <?php print date('d/m/Y G:i', $article['timestamp']); ?>
        </div>
        <div class="links">
          <a href="/article.php?id=<?php print $article['id']; ?>">Читати далі</a>
          <!-- Посилання доступні тільки для редактора. -->
          <? if($editor): ?>
            <a href="/edit.php?id=<?php print $article['id']; ?>">Редагувати</a>
            <a href="/delete.php?id=<?php print $article['id']; ?>">Видалити</a>
          <? endif; ?>
        </div>
      </div>

    </div>
    <hr>
  <?php endforeach; ?>

  <div class="pager">
    <!-- Пейджер на розробці. -->
    Pager this!
       
 </div>

</div>

<!-- Якщо користувач немає запису у сесії, тоді виводимо йому форму. -->
<?php if(empty($_SESSION['login'])): ?>


  <div class="overlay"></div>

  <div class="popup" id="popup1">

        <span class="close">X</span>

        <form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="POST" class="form-login">
          <div class="field-item">
            <label for="name">Логін</label>
            <br>
            <input type="text" name="name" id="name" required>
          </div>

          <div class="field-item">
            <label for="name">Пароль</label>
            <br>
            <input type="password" name="pass">
          </div>

          <input type="submit" name="submit" value="Відправити">

           <script>
              $('.open_popup').click(function() {

                            var popup_id = $('#' + $(this).attr("rel"));

                            $(popup_id).show();

                            $('.overlay').show();

                    })

                    $('.popup .close, .overlay').click(function() {

                            $('.overlay, .popup').hide();

                    })
                    </script>

        </form>

  </div>
  
  
<?php endif; ?>


<?php
require('slider.html');
// Підключаємо футер сайту.
require('base/footer.php');
?>
