<?php
require 'common.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $st = $db->prepare('INSERT INTO messages(name, message, image) VALUES (:name, :msg, :img)');
    $st->bindValue(':name', $data['name']);
    $st->bindValue(':msg', $data['message']);
    $st->bindParam(':img', $n = null, PDO::PARAM_LOB);
    $st->execute();

} else {
  http_response_code(400);
}

?>
