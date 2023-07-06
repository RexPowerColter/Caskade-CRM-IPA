<?php

$GLOBALS['db'] = new PDO('mysql:host=localhost; dbname=caskade', 'caskade', 'O_FFN34wDbgTcyyW');
$registry->set('db', $db);

$layoutPath = "views/LayoutDefault.php";
$registry->set('layoutPath', $layoutPath);
