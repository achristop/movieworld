<?php
session_start();

require_once("config.php");

$userId = $_SESSION['id'];
$movieId = $_GET['id'];
$sql = 'DELETE FROM movies WHERE id = ' . $movieId . ' AND user_id = ' . $userId;

try {
    $pdo->exec($sql);
    header("location: profile.php");
} catch (PDOException $e) {
    echo $sql . "<br />" . $e->getMessage();
}
unset($pdo);
