<?php
require('common.php');


header('Content-Type: application/json');
$query = $db->query('SELECT * FROM messages ORDER BY created DESC LIMIT 10');
echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));

?>
