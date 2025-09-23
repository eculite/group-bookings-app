<?php
// Placeholder 2FA verification page - simulate code entry
session_start();
if (!isset($_SESSION['uid'])) header('Location: ../auth/signin.php');

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $code = trim($_POST['code']);
    // In real app verify code from SMS/email/TOTP. Here we accept '123456' as demo.
    if ($code === '123456') {
        header('Location: ../index.php');
        exit;
    } else {
        $error='Invalid code. Use 123456 for demo.';
    }
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>2FA Verify</title></head><body>
<h2>Two Factor Authentication (Demo)</h2>
<?php if(isset($error)) echo '<p style="color:red">'.htmlspecialchars($error).'</p>'; ?>
<form method="post">
<label>Enter code: <input name="code" required></label><br>
<button>Verify</button>
</form>
<p>Demo code: <strong>123456</strong></p>
</body></html>