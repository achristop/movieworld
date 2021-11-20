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
    <nav class="navbar navbar-expand-lg navbar-dark bg-very-dark">
      <div class="container">
        <a class="navbar-brand" href="/"><i class="bi bi-film"></i> MovieWorld </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item me-1">
              <a class="nav-link btn btn-success text-white" href="signin.php">Sign In <i class="bi bi-door-open"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary text-white" href="signup.php">Sign Up <i class="bi bi-door-closed-fill"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="row g-3">
        <div class="col-9">
          <div class="movies-info">
            <p>
              <span class="movie"><i class="bi bi-film"></i> Movies 89</span>
              <span class="sorting"><i class="bi bi-sort-up-alt"></i> Sort by</span>
              <span class="like"><i class="bi bi-hand-thumbs-up"></i> Likes</span>
              <span class="dislike"><i class="bi bi-hand-thumbs-down"></i> Dislikes</span>
              <span class="date"><i class="bi bi-calendar"></i> Dates</span>

            </p>
          </div>
          <div class="movie-texture">
            <div class="card bg-very-dark">
              <div class="card-body">
                <h3 class="card-title">No Time to Die</h3>
                <p>Posted 12/10/2021 <i class="bi bi-calendar"></i></p>
                <hr />
                <p class="card-text">James Bond has left active service. His peace is short-lived when Felix Leiter, an old friend from the CIA, turns up asking for help, leading Bond onto the trail of a mysterious villain armed with dangerous new technology.</p>
                <hr />
                <p>
                  <span class="like"><i class="bi bi-hand-thumbs-up"></i> 89</span> <span class="dislike"><i class="bi bi-hand-thumbs-down"></i> 46</span>
                  <span style="float:right">
                    Posted by <a class="postedby" href="#"><i class="bi bi-person-circle"></i> Andreas Christopoulos</a>
                  </span>
                </p>
              </div>
            </div>
          </div>
          <div class="movie-texture">
            <div class="card bg-very-dark">
              <div class="card-body">
                <h3 class="card-title">Spider-Man: No Way Home</h3>
                <p>Posted 19/10/2021</p>
                <hr />
                <p class="card-text">With Spider-Man's identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.</p>
                <hr />
                <p>Likes <span class="liked-movie">189</span> | Dislikes <span class="disliked-movie">52</span><span style="float:right"> Posted by <a class="postedby" href="#">Andreas Christopoulos</a></span></p>
              </div>
            </div>
          </div>
          <div class="movie-texture">
            <div class="card bg-very-dark">
              <div class="card-body">
                <h3 class="card-title">Star Trek Into Darkness</h3>
                <p>Posted 17/10/2021</p>
                <hr />
                <p class="card-text">After the crew of the Enterprise find an unstoppable force of terror from within their own organization, Captain Kirk leads a manhunt to a war-zone world to capture a one-man weapon of mass destruction.</p>
                <hr />
                <p>Likes <span class="liked-movie">39</span> | Dislikes <span class="disliked-movie">22</span><span style="float:right"> Posted by <a class="postedby" href="#">George Papidas</a></span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="footer mt-auto p-3 bg-very-dark">
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