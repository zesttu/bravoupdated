<!doctype html>
<html lang="sv">
<head>
<?php
if(ini_get('short_open_tag')) {
  ini_set('short_open_tag', 1);
}
?>
  <meta charset="utf-8">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$stylesheet?>">
</head>
<body>
  <div id="header">
    <?=$header?>
  </div>
  <div id="main" role="main">
    <?=$main?>
    <?=get_debug()?>
  </div>
  <div id="footer">
    <?=$footer?>
  </div>
</body>
</html>
