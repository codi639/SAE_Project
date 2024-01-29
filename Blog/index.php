<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // If not logged in, check for login form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $submitted_username = $_POST['username'];
        $submitted_password = $_POST['password'];

        // Replace these values with your actual admin credentials
        $admin_username = 'admin';
        $admin_password = 'minad123';

        // Verify the submitted credentials
        if ($submitted_username === $admin_username && $submitted_password === $admin_password) {
            $_SESSION['username'] = $admin_username;
            $username = $admin_username;
        } else {
            $error_message = 'Invalid username or password';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Blog Bowling</h1>
        <?php
        // Display a welcome message or login form based on authentication
        if (isset($username)) {
            echo "<p>Welcome, $username!</p>";
        } else {
            // Display login form
            ?>
            <form method="post" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <button type="submit">Login</button>
            </form>
            <?php
            if (isset($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }
        }
        ?>
    </header>

    <main>
        <section>
            <h2>Bienvenue sur le Bowling Blog</h2>
            <p>Ce blog contient pleins d'informations amusantes sur l'histoire et les faits du Bowling !</p>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> José Thierry</p>
    </footer>

</body>
</html>