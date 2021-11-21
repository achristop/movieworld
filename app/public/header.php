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
              <li class="nav-item me-1 mb-1">
                <a class="nav-link btn btn-success text-white" href="newMovie.php">Movie <i class="bi bi-plus-circle"></i></a>
              </li>
              <li class="nav-item me-1 mb-1">
                <a class="nav-link btn btn-primary text-white" href="profile.php">' . $_SESSION['fullname'] . ' <i class="bi bi-person-circle"></i></a>
              </li>
              <li class="nav-item me-1 mb-1">
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