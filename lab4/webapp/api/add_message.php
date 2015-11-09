<?php
require 'common.php';

$st = $db->prepare('INSERT INTO messages(name, message, image) VALUES (:name, :msg, :img)');
$st->bindParam(':name', 'Joel');
$st->bindParam(':msg', 'Hello world');
$st->bindParam(':img', $bytes, PDO::PARAM_LOB);
$st->execute();


?>
