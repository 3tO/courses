<?php


$db = array(
  'db_name' => 'test',
  'db_user' => 'root',
  'db_pass' => '1q2w3e4r',
);
try {
    $dsn = "mysql:host=localhost;dbname={$db['db_name']}";
    $conn = new PDO($dsn, $db['db_user'], $db['db_pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    print "DB ERROR: {$e->getMessage()}";
}
