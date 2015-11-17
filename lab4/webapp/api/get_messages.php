<?php
require('common.php');


header('Content-Type: application/json');
$query = $db->query('SELECT * FROM messages ORDER BY created DESC LIMIT 10');
$results = $query->fetchAll();

foreach ($results as &$row) {
  $row['created'] = date('Y-m-d H:i', strtotime($row['created']));
}

$data = json_encode($results);
if ($data === false) {
  error_log("Error");
  http_response_code(500);
} else
  echo $data;

?>
