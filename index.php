<?php

ini_set("session.save_path", 'tmp/session');
require __DIR__.'/bootstrap/autoload.php';

$app = new \Libs\Bootstrap();
$app->__init();


?>