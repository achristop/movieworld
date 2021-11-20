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
                            <a class="nav-link btn btn-primary text-white" href="signin.php">Profile <i class="bi bi-person-circle"></i></a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link btn btn-danger text-white" href="signin.php">Sign Out <i class="bi bi-power"></i></a>
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
                    <h2 class="text-center text-gold p-3">Andreas Christopoulos</h2>
                    <p class="text-center text-white">
                        <span class="movie"><i class="bi bi-film"></i> 89</span>
                        <span class="like"><i class="bi bi-hand-thumbs-up"></i> 89</span>
                        <span class="dislike"><i class="bi bi-hand-thumbs-down"></i> 49</span>
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
                                    <button class="btn btn-warning text-white">Edit <i class="bi bi-tools"></i></button>
                                    <button class="btn btn-danger">Delete <i class="bi bi-trash2-fill"></i></button>
                                </span>
                            </p>
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


</body>

</html>