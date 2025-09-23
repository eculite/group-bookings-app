<?php require 'conf.php'; session_start(); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $res = $mysqli->prepare('SELECT id,name,password,twofa_enabled FROM users WHERE email=?');
    $res->bind_param('s',$email);
    $res->execute();
    $res->bind_result($id,$name,$hash,$twofa);
    if ($res->fetch() && password_verify($_POST['password'],$hash)) {
        $_SESSION['uid']=$id;
        $_SESSION['uname']=$name;
        if ($twofa) {
            // Redirect to 2FA step (placeholder)
            header('Location: ../2fa/verify.php');
        } else {
            header('Location: ../index.php');
        }
        exit;
    } else {
        $error='Invalid credentials';
    }
    $res->close();
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Sign In</title></head><body>
<h2>Sign In</h2>
<?php if(isset($error)) echo '<p style="color:red">'.htmlspecialchars($error).'</p>'; ?>
<form method="post">
<label>Email: <input name="email" required></label><br>
<label>Password: <input name="password" type="password" required></label><br>
<button>Sign in</button>
</form>
</body></html>
