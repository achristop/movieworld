<?php
// Initialize session
session_start();

// Include config file
require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Define variables and initialize with empty values
$movieId = $_GET['id'];
$movieSQL = $pdo->query('SELECT title, description FROM movies WHERE id =' . $movieId);
$movie = $movieSQL->fetch();
$title = $movie['title'];
$description = $movie['description'];
$title_err = $description_err = "";
$userId = $_SESSION['id'];

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    if (empty($_POST["title"])) {
        $title_err = "Please enter a title";
    } else {
        $title = $_POST["title"];
    }

    // Validate description
    if (empty($_POST["description"])) {
        $description_err = "Please enter a description";
    } else {
        $description = $_POST["description"];
    }

    // Check input errors before inserting in database
    if (empty($title_err) && empty($description_err)) {

        // Prepare an update statement
        $sql = "UPDATE movies SET title = :title , description = :description, updated = NOW() WHERE id = " . $movieId;
        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":title", $param_title, PDO::PARAM_STR);
            $stmt->bindParam(":description", $param_description, PDO::PARAM_STR);

            // Set parameters
            $param_title = $title;
            $param_description = $description;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: profile.php");
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
<?php include 'header.php' ?>
<main class="container">
    <div class="row g-1">
        <div class="col-lg-9 col-12">
            <div class="new-movie-texture">
                <h1 class="text-gold text-center"><i class="bi bi-tools"></i> Edit Movie</h1>
            </div>
            <div class="new-movie-texture">
                <form class="form-signin needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $movieId; ?>" method="post" style="max-width: 600px;" novalidate>

                    <div class="form-floating">
                        <input type="text" class="form-control" name="title" id="floatingInput" value="<?php print $title ?>" placeholder="Title" required>
                        <label for="floatingInput"><i class="bi bi-card-heading"></i> Title</label>
                    </div>
                    <div class="form-floating">
                        <textarea type="text" class="form-control" name="description" id="floatingInput" placeholder="Description" required><?php print $description ?></textarea>
                        <label for="floatingInput"><i class="bi bi-card-text"></i> Description</label>
                    </div>
                    <div class="checkbox mb-3">

                    </div>
                    <button class="w-100 mb-1 btn btn-lg btn-success" type="submit">Update <i class="bi bi-save-fill"></i></button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>