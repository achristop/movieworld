<?php

// Initialize session
session_start();

// Include config file
require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Get URL parameters
$movieId = $_GET['movieId'] ?? null;
$userId = $_GET['userId'] ?? null;
$rating = $_GET['rating'] ?? null;

// Implement logic for rating system
if (!empty($movieId) && !empty($userId) && !empty($rating)) {
    $sql_check_rating = "SELECT rating, id FROM ratings WHERE movie_id = " . $movieId . " AND user_id = " . $userId;
    $sql_insert_rating = "INSERT INTO ratings (rating, movie_id, user_id) VALUES (" . $rating . ", " . $movieId . "," . $userId . ")";
    try {
        $check_rating = $pdo->query($sql_check_rating)->fetchAll();
        $rating_id = $rating_value = null;
        foreach ($check_rating as $row) {
            $rating_id = $row['id'];
            $rating_value = $row['rating'];
        }
        if ($rating_id === null)
            $pdo->exec($sql_insert_rating);
        else {
            if ($rating_value === '0') {
                $rating_value = $rating;
            } elseif ($rating_value === '1' && $rating === '1') {
                $rating_value = 0;
            } elseif ($rating_value === '1' && $rating === '-1') {
                $rating_value = -1;
            } else if ($rating_value === '-1' && $rating === '-1') {
                $rating_value = 0;
            } else if ($rating_value === '-1' && $rating === '1') {
                $rating_value = 1;
            }
            $sql_update_rating = "UPDATE ratings SET rating = " . $rating_value . " , updated = NOW() WHERE id = " . $rating_id;
            $pdo->exec($sql_update_rating);
        }
        header("location: index.php");
    } catch (PDOException $e) {
        echo "Error: " . $e;
    }
} else {
    echo "Error: URL parameters are empty!";
}
