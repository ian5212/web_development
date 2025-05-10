<?php
include('config.php');
$db = new SQLite3($path. '/home/databases/movies2.db');

$sql = "INSERT INTO movies (title, year) VALUES ('Sinners', '2025')";
$statement = $db->prepare($sql);

$result = $statement->execute();

$db->close();
unset($db);
?>
