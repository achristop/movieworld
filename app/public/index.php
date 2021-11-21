<?php
session_start();
// Include config file
require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if ($_SESSION && $_SESSION["loggedin"] === true) {
  $userId = $_SESSION['id'];
}

$sort = $_GET["sort"] ?? null;

if ($sort === "likes") {
  $sql_movies = "SELECT * FROM movies INNER JOIN ratings ON movies.id = ratings.movie_id WHERE ratings.rating != 0 GROUP BY movies.id ORDER BY ratings.movie_id ASC";
} elseif ($sort === "dislikes") {
  $sql_movies = "SELECT * FROM movies INNER JOIN ratings ON movies.id = ratings.movie_id WHERE ratings.rating != 0 GROUP BY movies.id ORDER BY ratings.movie_id DESC";
} else {
  $sql_movies = 'SELECT * FROM movies ORDER BY updated DESC';
}

$sql_users = 'SELECT id, fullname, username FROM users';
$sql_total_movies = 'SELECT COUNT(*) FROM movies';
$total_movies = $pdo->query($sql_total_movies)->fetchColumn();
$usernames = array();
foreach ($pdo->query($sql_users) as $row) {
  $usernames[$row['id']] = $row['fullname'];
}

include 'header.php';
?>

<main>
  <div class="container">
    <div class="row g-3">
      <div class="col-lg-9 col-12">
        <div class="movies-info">
          <button class="btn btn-success m-1" onclick="(e)=>e.preventDefault();"><i class="bi bi-film"></i> Movies <?php print $total_movies ?></button>
          <button class="btn btn-warning m-1 text-white" onclick="(e)=>e.preventDefault();"><i class="bi bi-sort-up-alt"></i> Sort by</button>
          <a class="btn btn-primary m-1" href="index.php?sort=likes"><i class="bi bi-hand-thumbs-up"></i> Likes</a>
          <a class="btn btn-danger m-1" href="index.php?sort=dislikes"><i class="bi bi-hand-thumbs-down"></i> Dislikes</a>
          <a class="btn btn-info text-white m-1" href="/"><i class="bi bi-calendar"></i> Dates</a>
        </div>
        <?php
        foreach ($pdo->query($sql_movies) as $row) {

          if ($sort === "likes" || $sort === "dislikes") {
            $sql_likes = 'SELECT COUNT(*) FROM ratings WHERE movie_id=' . $row['movie_id'] . ' AND rating = 1';
            $sql_dislikes = 'SELECT COUNT(*) FROM ratings WHERE movie_id=' . $row['movie_id'] . ' AND rating = -1';
          } else {
            $sql_likes = 'SELECT COUNT(*) FROM ratings WHERE movie_id=' . $row['id'] . ' AND rating = 1';
            $sql_dislikes = 'SELECT COUNT(*) FROM ratings WHERE movie_id=' . $row['id'] . ' AND rating = -1';
          }
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
          print '<br /><br />';
          print '<span class="like"><i class="bi bi-hand-thumbs-up"></i> ' . $likes . '</span> ';
          print '<span class="dislike"><i class="bi bi-hand-thumbs-down"></i> ' . $dislikes . '</span>';
          print '<span style="float:right">';
          print 'Posted by <a class="postedby" href="#"><i class="bi bi-person-circle"></i> ' . $usernames[$row['user_id']] . '</a>';
          print '</span>';
          print '</p>';
          if ($_SESSION && $_SESSION["loggedin"] === true && $row['user_id'] != $userId) {
            $sql_rating = "SELECT rating FROM ratings WHERE user_id=" . $_SESSION['id'] . " AND movie_id=" . $row['id'];
            $rating_value = 0;
            try {
              foreach ($pdo->query($sql_rating) as $r) {
                $rating_value = $r["rating"];
              }
            } catch (PDOException $e) {
            }
            print '<p>';
            print '<hr />';
            if ($rating_value === '1') {
              print '<span style="width:49%;float:left;"><a href="/rating.php?movieId=' . $row['id'] . '&userId=' . $userId . '&rating=1" style="width:100%;float:left;" class="btn btn-primary white-border">Like <i class="bi bi-hand-thumbs-up"></i></a></span>';
              print '<span style="width:49%;float:right;"><a href="/rating.php?movieId=' . $row['id'] . '&userId=' . $userId . '&rating=-1" style="width:100%;float:right;" class="btn btn-dark">Dislike <i class="bi bi-hand-thumbs-down"></i></a></span>';
            } else if ($rating_value === '-1') {
              print '<span style="width:49%;float:left;"><a href="/rating.php?movieId=' . $row['id'] . '&userId=' . $userId . '&rating=1" style="width:100%;float:left;" class="btn btn-dark">Like <i class="bi bi-hand-thumbs-up"></i></a></span>';
              print '<span style="width:49%;float:right;"><a href="/rating.php?movieId=' . $row['id'] . '&userId=' . $userId . '&rating=-1" style="width:100%;float:right;" class="btn btn-danger">Dislike <i class="bi bi-hand-thumbs-down"></i></a></span>';
            } else {
              print '<span style="width:49%;float:left;"><a href="/rating.php?movieId=' . $row['id'] . '&userId=' . $userId . '&rating=1" style="width:100%;float:left;" class="btn btn-dark">Like <i class="bi bi-hand-thumbs-up"></i></a></span>';
              print '<span style="width:49%;float:right;"><a href="/rating.php?movieId=' . $row['id'] . '&userId=' . $userId . '&rating=-1" style="width:100%;float:right;" class="btn btn-dark">Dislike <i class="bi bi-hand-thumbs-down"></i></a></span>';
            }
            print '</p>';
          }
          print '</div>';
          print '</div>';
          print '</div>';
        }
        unset($pdo);
        ?>
      </div>
    </div>
  </div>
</main>

<?php include 'footer.php'; ?>