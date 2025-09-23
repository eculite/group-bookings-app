<?php require '../auth/conf.php'; session_start(); if(!isset($_SESSION['uid'])) header('Location: ../auth/signin.php');
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $item = $_POST['item']; $s = $_POST['start_date']; $e = $_POST['end_date'];
    $stmt = $mysqli->prepare('INSERT INTO bookings (user_id,item,start_date,end_date) VALUES (?,?,?,?)');
    $stmt->bind_param('isss', $_SESSION['uid'],$item,$s,$e); $stmt->execute(); $stmt->close();
    header('Location: list.php');
    exit;
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Create Booking</title></head><body>
<h2>Create Booking</h2>
<form method="post">
<label>Item: <input name="item" required></label><br>
<label>Start: <input name="start_date" type="date" required></label><br>
<label>End: <input name="end_date" type="date" required></label><br>
<button>Create</button>
</form>
</body></html>