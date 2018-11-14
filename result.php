<?php 

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Poll.php');


try{
  $poll = new \MyApp\Poll();
}catch(Exception $e){
  echo $e->getMessage();
  exit;
}

$results = [
  0 => 12,
  1 => 32,
  2 => 44];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Poll Result</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <h1>Result</h1>
  <form action="" method="post">
    <div class="row">
      <?php ($i = 0; $i < 3; $i++) : ?>
      <div class="box" id="box_<?= h($i); ?>"><?= h($results[$i]); ?></div>
      <?php endfor; ?>


      <div class="box" id="box_1" data-id="1"></div>
      <div class="box" id="box_2" data-id="2"></div>
      <input type="hidden" id="answer" name="answer" value="">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </div>
    <a href="/"><div id="btn">Go Back</div></a>
  </form>
</body>  
</html>
