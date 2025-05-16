<?php
if (isset($_POST['list'])) {
    $list = $_POST['list'];
    file_put_contents('todo_list.txt', $list);
    
} else {
    echo "?";
}
?>

