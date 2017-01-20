<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php foreach ($items as $item):  ?>
      <h1>  <?php echo $item->title ; ?></h1><br>
      <div>
        <?php echo $item->text; ?>
      </div>
      <br>
      <div>
        <?php echo $item->date; ?>
      </div>

    <?php endforeach; ?>

    <div class="">
      <br>
      <a href="/views/add.php">Добавить новость</a>
    </div>
    <?php echo date("d.m.Y H : i : s"); ?>
  </body>
</html>
