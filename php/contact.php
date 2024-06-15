<?php
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {
        $name = fix_string($_POST['name']);
    }
    if (isset($_POST['email'])) {
        $email = fix_string($_POST['email']);
    }
    if (isset($_POST['message'])) {
        $message = fix_string($_POST['message']);
    }

    $fail = validate_name($name);
    $fail .= validate_email($email);
    $fail .= validate_message($message);

    if ($fail == "") {
        echo "<script>alert('Form data successfully validated: $name, $email, $message.');</script>";
        // Process the form data, e.g., save to the database or send an email
    }
}

function validate_name($field) {
    return ($field == "") ? "No name was entered.<br>" : "";
}

function validate_email($field) {
    if ($field == "") return "No email was entered.<br>";
    else if (!filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return "The email address is invalid.<br>";
    }
    return "";
}

function validate_message($field) {
    return ($field == "") ? "No message was entered.<br>" : "";
}

function fix_string($string) {
    return htmlentities($string);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
        <div class="header-main">
            <div class="container">
                <a href="#" class="header-logo">
                    <img src="./images/logo/logo.svg" alt="Logo" width="120" height="36">
                </a>
                <div class="header-search-container">
                    <input type="search" name="search" class="search-field" placeholder="Search Products">
                    <button class="search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <nav class="header-navigation">
                <ul>
                    <li><a href="index.html#home">Home</a></li>
                    <li><a href="index.html#about-us">About Us</a></li>
                    <li><a href="index.html#categories">Categories</a></li>
                    <li><a href="index.html#products">Products</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $fail != ""): ?>
            <div style="color: red;">
                <strong>Please correct the following errors:</strong><br>
                <?php echo $fail; ?>
            </div>
        <?php endif; ?>
        <form action="contact.php" method="POST" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required><?php echo $message; ?></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>