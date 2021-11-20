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
    <link href="./assets/css/sign-up-in.css" rel="stylesheet" />

    <title>MovieWorld - Sign Up</title>
</head>

<body class="text-center">

    <main class="form-signin">
        <form>
            <h1><a class="custom-brand" href="/"><i class="bi bi-film"></i> MovieWorld</a></h1>
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Fullname">
                <label for="floatingInput"><i class="bi bi-file-person-fill"></i> Fullname</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput"><i class="bi bi-person-circle"></i> Username</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput"><i class="bi bi-mailbox2"></i> Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword"><i class="bi bi-lock-fill"></i> Password</label>
            </div>

            <div class="checkbox mb-3">

            </div>
            <button class="w-100 mb-1 btn btn-lg btn-success" type="submit">Sign up <i class="bi bi-door-closed"></i></button>
            or
            <a class="w-100 btn mt-1 btn-lg btn-primary" href="/signin.php" type="submit">Sign in <i class="bi bi-door-open"></i></a>
            <p class="mt-5 mb-3 text-muted"><i class="bi bi-film"></i> MovieWorld &copy; 2021</p>
        </form>
    </main>



</body>

</html>