<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$fullname = $username = $password = "";
$fullname_err = $username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Validate fullname
    if (empty($_POST["fullname"])) {
        $fullname_err = "Please enter a fullname";
    } else {
        $fullname = $_POST["fullname"];
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($fullname_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (fullname, username, password) VALUES (:fullname, :username, :password)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":fullname", $param_fullanme, PDO::PARAM_STR);
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_fullanme = $fullname;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: signin.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Close connection
    unset($pdo);
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
    <link href="./assets/css/sign-up-in.css" rel="stylesheet" />

    <title>MovieWorld - Sign Up</title>
</head>

<body class="text-center">

    <main class="form-signin">
        <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
            <h1><a class="custom-brand" href="/"><i class="bi bi-film"></i> MovieWorld</a></h1>
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            <div class="form-floating">
                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Fullname" required>
                <label for="fullname"><i class="bi bi-file-person-fill"></i> Fullname</label>
                <div class="invalid-feedback"><?php echo $fullname_err; ?></div>
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                <label for="floatingInput"><i class="bi bi-person-circle"></i> Username</label>
                <div class="invalid-feedback"><?php echo $username_err; ?></div>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password"><i class="bi bi-lock-fill"></i> Password</label>
                <div class="invalid-feedback"><?php echo $password_err; ?></div>
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
<script src="./assets/js/script.js"></script>

</html>