<?php require 'conf.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = trim($_POST['phone']);
    $stmt = $mysqli->prepare('INSERT INTO users (name,email,password,phone) VALUES (?,?,?,?)');
    $stmt->bind_param('ssss',$name,$email,$password,$phone);
    $stmt->execute();
    $stmt->close();
    header('Location: signin.php');
    exit;
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Sign Up</title></head><body>
<h2>Sign Up</h2>
<form method="post">
<label>Name: <input name="name" required></label><br>
<label>Email: <input name="email" required></label><br>
<label>Password: <input name="password" type="password" required></label><br>
<label>Phone: <input name="phone"></label><br>
<button>Register</button>
</form>
</body></html>cd "C:\Users\mich\Desktop\group-bookings-app"
