<?php

include("dbh.php");

$dbh = new Dbh;
$pdo = $dbh->connect();

if($pdo) {
    try {
        $sql = 'SELECT * FROM posts WHERE author = :author';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['author' => 'Brad']);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($posts as $post) {
            echo $post['title'] . '<br>';
        }
    } catch (PDOException $e) {
        echo "Query error: " . $e;
    }
}

?>