<?php


if (!isset($_GET['command'])) {
    print "error";
    exit();
}

$path = '/home/databases';
$db = new SQLite3($path.'/chat.db');

$cmd = $_GET['command'];

if ($cmd == 'authentification') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' || $password == '') {
        exit();
    }

    $passwordsearch = $db->prepare("SELECT passowrd FROM users WHERE username = :username");
    $passwordsearch->bindValue(':username', $username);
    $result = $passwordsearch->execute();
    $password_row = $result->fetchArray();

    if (!$password_row) {
        $newpass = $db->prepare("INSERT INTO users (username, passowrd) VALUES (:username, :password)");
        $newpass->bindValue(':username', $username);
        $newpass->bindValue(':password', $password);
        $newpass->execute();
        exit();
    } else {
        $storedPassword = $password_row['passowrd'];
        if ($storedPassword == $password) {
            echo 'login';
        } else {
            echo 'Incorrect Password';
        }
    }
    exit();
}

if ($cmd == 'savemessage' && isset($_POST['username']) && isset($_POST['message'])) {
    $sql = "INSERT INTO messages (username, message) VALUES (:username, :message)";
    $statement = $db->prepare($sql);
    $statement->bindValue(':username', $_POST['username']);
    $statement->bindValue(':message', $_POST['message']);
    $result = $statement->execute();
    $id = $db->lastInsertRowID();

    if ($id) {
        print "success";
    } else {
        print "error";
    }
    exit();
}

else if ($cmd == 'getmessages' && isset($_POST['id'])) {
    $sql = "SELECT id, username, message, date FROM messages WHERE id > :id ORDER BY id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $_POST['id']);
    $result = $statement->execute();

    $send_back = [];
    $send_back['messages'] = [];
    $send_back['id'] = $_POST['id'];

    while ($row = $result->fetchArray()) {
        $record = [];
        $record['id'] = $row[0];
        $record['username'] = $row[1];
        $record['message'] = $row[2];
        $record['date'] = $row[3];
        array_push($send_back['messages'], $record);
        $send_back['id'] = $record['id'];
    }

    print json_encode($send_back);
    exit();
}

else if ($cmd == 'roll') {
    $u = $_POST['username'];
    $v = rand(1, 100);

    $q = $db->prepare("INSERT INTO rolls (username, value) VALUES (:u, :v)");
    $q->bindValue(':u', $u);
    $q->bindValue(':v', $v);
    $q->execute();

    $msg = "$u rolled a $v on a 100 sided die";
    $q = $db->prepare("INSERT INTO messages (username, message) VALUES ('SYSTEM', :m)");
    $q->bindValue(':m', $msg);
    $q->execute();

    exit();
}

else if ($cmd == 'rollhistory') {
    $n = intval($_POST['limit'] ?? 10);
    if ($n < 1 || $n > 100) $n = 10;
    $q = $db->prepare("SELECT value, username, date FROM rolls ORDER BY date DESC LIMIT :l");
    $q->bindValue(':l', $n, SQLITE3_INTEGER);
    $res = $q->execute();

    $out = [];
    while ($r = $res->fetchArray()) {
        $out[] = $r;
    }

    print json_encode($out);
    exit();
}

else {
    print "error";
}

$db->close();
unset($db);
?>

