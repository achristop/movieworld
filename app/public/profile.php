<?php
// Initialize the session
session_start();
// Include config file
require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$id = $_SESSION['id'];
$sql_total_movies = 'SELECT COUNT(*) FROM movies WHERE user_id=' . $id;
$total_movies = $pdo->query($sql_total_movies)->fetchColumn();
$sql_movies = 'SELECT * FROM movies WHERE user_id=' . $id . ' ORDER BY updated DESC';
$fullname = $_SESSION['fullname'];
$sql_total_likes = 'SELECT COUNT(*) FROM ratings WHERE rating = 1 AND user_id=' . $id;
$sql_total_dislikes = 'SELECT COUNT(*) FROM ratings WHERE rating = 0 AND user_id';
$total_likes = $pdo->query($sql_total_likes)->fetchColumn();
$total_dislikes = $pdo->query($sql_total_dislikes)->fetchColumn();

$total_likes = 0;
$total_dislikes = 0;
foreach ($pdo->query($sql_movies) as $row) {
    $sql_total_likes = 'SELECT COUNT(*) FROM ratings WHERE rating = 1 AND movie_id=' . $row['id'];
    $sql_total_dislikes = 'SELECT COUNT(*) FROM ratings WHERE rating = -1 AND movie_id=' . $row['id'];
    try {
        $total_dislikes += $pdo->query($sql_total_dislikes)->fetchColumn();
        $total_likes += $pdo->query($sql_total_likes)->fetchColumn();
    } catch (PDOException $e) {
    }
}

?>
<?php include "header.php"; ?>

<main class="container">
    <div class="row g-1">
        <div class="col-lg-9 col-12">
            <div class="movie-texture">
                <div class="profile m-auto text-center">
                    <i class="bi bi-person-circle text-white" style="font-size: 6.4rem;"></i>
                </div>
                <h2 class="text-center text-gold p-3"><?php echo $fullname ?></h2>
                <p class="text-center text-white">
                    <span class="movie"><i class="bi bi-film"></i> <?php echo $total_movies ?></span>
                    <span class="like"><i class="bi bi-hand-thumbs-up"></i> <?php echo $total_likes ?></span>
                    <span class="dislike"><i class="bi bi-hand-thumbs-down"></i> <?php echo $total_dislikes ?></span>
                </p>
            </div>

            <?php
            foreach ($pdo->query($sql_movies) as $row) {
                $sql_likes = 'SELECT COUNT(*) FROM ratings WHERE movie_id=' . $row['id'] . ' AND rating = 1';
                $sql_dislikes = 'SELECT COUNT(*) FROM ratings WHERE movie_id=' . $row['id'] . ' AND rating = -1';
                try {
                    $likes = $pdo->query($sql_likes)->fetchColumn();
                } catch (PDOException $e) {
                    $likes = 0;
                }
                try {
                    $dislikes = $pdo->query($sql_dislikes)->fetchColumn();
                } catch (PDOException $e) {
                    $dislikes = 0;
                }
                print '<div class="movie-texture">';
                print '<div class="card bg-very-dark">';
                print '<div class="card-body">';
                print '<h3 class="card-title">' . $row['title'] . '</h3>';
                print '<p>Posted ' . $row['updated'] . ' <i class="bi bi-calendar"></i></p>';
                print '<hr />';
                print '<p class="card-text">' . $row['description'] . '</p>';
                print '<hr />';
                print '<p>';
                print '<span class="like"><i class="bi bi-hand-thumbs-up"></i>' . $likes . '</span> ';
                print '<span class="dislike"><i class="bi bi-hand-thumbs-down"></i>' . $dislikes . '</span>';
                print '<span style="float:right">';
                print '<a class="btn btn-warning text-white" href="editMovie.php?id=' . $row['id'] . '">Edit <i class="bi bi-tools"></i></a> ';
                print '<a class="btn btn-danger  text-white" href="deleteMovie.php?id=' . $row['id'] . '">Delete <i class="bi bi-trash2-fill"></i></a>';
                print '</span>';
                print '</p>';
                print '</div>';
                print '</div>';
                print '</div>';
            }
            ?>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>