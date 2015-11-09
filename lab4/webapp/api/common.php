<?php

$db = new PDO('pgsql:host=database;dbname=postgres', 'postgres', 'postgres');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
