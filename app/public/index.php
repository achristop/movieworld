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
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="./assets/css/app.css" rel="stylesheet" />
  <title>MovieWorld - Welcome</title>
</head>

<body>
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-very-dark">
      <div class="container">
        <a class="navbar-brand" href="/"><i class="bi bi-film"></i> MovieWorld </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <?php
            if ($_SESSION && $_SESSION["loggedin"] === true) {
              echo '
              <li class="nav-item me-1">
                <a class="nav-link btn btn-success text-white" href="newMovie.php">Movie <i class="bi bi-plus-circle"></i></a>
              </li>
              <li class="nav-item me-1">
                <a class="nav-link btn btn-primary text-white" href="profile.php">' . $_SESSION['fullname'] . ' <i class="bi bi-person-circle"></i></a>
              </li>
              <li class="nav-item me-1">
                <a class="nav-link btn btn-danger text-white" href="logout.php">Sign Out <i class="bi bi-power"></i></a>
              </li>';
            } else {
              echo ' <li class="nav-item me-1">
              <a class="nav-link btn btn-success text-white" href="signin.php">Sign In <i class="bi bi-door-open"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary text-white" href="signup.php">Sign Up <i class="bi bi-door-closed-fill"></i></a>
            </li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="add-space"></div>
  <main>
    <div class="container">
      <div class="row g-3">
        <div class="col-lg-9 col-12">
          <div class="movies-info">
            <p>
              <span class="movie"><i class="bi bi-film"></i> Movies <?php print $total_movies ?></span>
              <span class="sorting"><i class="bi bi-sort-up-alt"></i> Sort by</span>
              <a class="info-style" href="index.php?sort=likes"><span class="like"><i class="bi bi-hand-thumbs-up"></i> Likes</span></a>
              <a class="info-style" href="index.php?sort=dislikes"><span class="dislike"><i class="bi bi-hand-thumbs-down"></i> Dislikes</span></a>
              <a class="info-style" href="/"><span class="date"><i class="bi bi-calendar"></i> Dates</span></a>
            </p>
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
          ?>
        </div>
      </div>
    </div>
  </main>
  <div class="add-space"></div>
  <footer class="footer fixed-bottom mt-auto p-3 bg-very-dark">
    <div class="container">
      <br />
      <p class="text-gold text-center"><i class="bi bi-film"></i> MovieWorld © 2021</p>
    </div>
  </footer>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>