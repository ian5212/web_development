<?php
header("Content-Type: application/json");

$filename = 'todo_list.txt';

if (file_exists($filename)) {
    $data = file_get_contents($filename);
    echo $data;
} else {
    echo json_encode([]); // return an empty array if file doesn't exist
}
?>

