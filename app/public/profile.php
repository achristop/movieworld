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
    <link href="./assets/css/profile.css" rel="stylesheet" />

    <title>MovieWorld - Sign Up</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-very-dark">
            <div class="container">
                <a class="navbar-brand" href="/"><i class="bi bi-film"></i> MovieWorld </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-1">
                            <a class="nav-link btn btn-success text-white" href="newMovie.php">Movie <i class="bi bi-plus-circle"></i></a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link btn btn-primary text-white" href="profile.php"><?php print $_SESSION['fullname'] ?> <i class="bi bi-person-circle"></i></a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link btn btn-danger text-white" href="logout.php">Sign Out <i class="bi bi-power"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <div class="row g-1">
            <div class="col-9">
                <div class="movie-texture">
                    <div class="profile m-auto text-center">
                        <i class="bi bi-person-circle text-white" style="font-size: 6.4rem;"></i>
                    </div>
                    <h2 class="text-center text-gold p-3"><?php echo $fullname ?></h2>
                    <p class="text-center text-white">
                        <span class="movie"><i class="bi bi-film"></i> <?php echo $total_movies ?></span>
                        <span class="like"><i class="bi bi-hand-thumbs-up"></i> 89</span>
                        <span class="dislike"><i class="bi bi-hand-thumbs-down"></i> 49</span>
                    </p>
                </div>

                <?php
                foreach ($pdo->query($sql_movies) as $row) {
                    print '<div class="movie-texture">';
                    print '<div class="card bg-very-dark">';
                    print '<div class="card-body">';
                    print '<h3 class="card-title">' . $row['title'] . '</h3>';
                    print '<p>Posted ' . $row['updated'] . ' <i class="bi bi-calendar"></i></p>';
                    print '<hr />';
                    print '<p class="card-text">' . $row['description'] . '</p>';
                    print '<hr />';
                    print '<p>';
                    print '<span class="like"><i class="bi bi-hand-thumbs-up"></i> 89</span> <span class="dislike"><i class="bi bi-hand-thumbs-down"></i> 46</span>';
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
    <footer class="footer mt-auto p-3 bg-very-dark">
        <div class="container">
            <br />
            <p class="text-gold text-center"><i class="bi bi-film"></i> MovieWorld © 2021</p>
        </div>
    </footer>


</body>

</html>