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
                <div class="new-movie-texture">
                    <h1 class="text-gold text-center">Edit Movie</h1>
                </div>
                <div class="new-movie-texture">
                    <form class="form-signin" style="max-width: 600px;">

                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Title">
                            <label for="floatingInput"><i class="bi bi-card-heading"></i> Title</label>
                        </div>
                        <div class="form-floating">
                            <textarea type="text" class="form-control" id="floatingInput" placeholder="Description"></textarea>
                            <label for="floatingInput"><i class="bi bi-card-text"></i> Description</label>
                        </div>
                        <div class="checkbox mb-3">

                        </div>
                        <button class="w-100 mb-1 btn btn-lg btn-success" type="submit">Save <i class="bi bi-save-fill"></i></button>
                    </form>
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