<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javatpoint";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<div class="register-container" id="register">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="top">
            <span>Have an account? <a href="#" onclick="login()">Login</a></span>
            <header>Sign Up</header>
        </div>
        <div class="two-forms">
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Firstname" name="firstname">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Lastname" name="lastname">
                <i class="bx bx-user"></i>
            </div>
        </div>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Email" name="email">
            <i class="bx bx-envelope"></i>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" placeholder="Password" name="password">
            <i class="bx bx-lock-alt"></i>
        </div>
        <div class="input-box">
            <input type="submit" class="submit" value="Register">
        </div>
        <div class="two-col">
            <div class="one">
                <input type="checkbox" id="register-check" name="remember_me">
                <label for="register-check">Remember Me</label>
            </div>
            <div class="two">
                <label><a href="#">Terms & conditions</a></label>
            </div>
        </div>
    </form>
</div>
