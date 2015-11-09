<?php
require('common.php');


header('Content-Type: application/json');
$query = $db->query('SELECT name, message FROM messages ORDER BY created DESC LIMIT 10');
$data = json_encode($query->fetchAll(PDO::FETCH_ASSOC));
if ($data === false) {
  error_log("Error");
  http_response_code(500);
} else
  echo $data;

?>
