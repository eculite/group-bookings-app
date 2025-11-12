<?php require '../auth/conf.php'; ?>
<?php
$res = $mysqli->query('SELECT b.id,b.item,b.start_date,b.end_date,u.name FROM bookings b JOIN users u ON b.user_id=u.id ORDER BY b.start_date ASC');
?>
<!doctype html><html><head><meta charset="utf-8"><title>Bookings</title></head><body>
<h2>Bookings</h2>
<?php if($res && $res->num_rows): ?>
<ol>
<?php while($r=$res->fetch_assoc()): ?>
<li><?php echo htmlspecialchars($r['item']).' — '.htmlspecialchars($r['name']).' ('.htmlspecialchars($r['start_date']).')'; ?></li>
<?php endwhile; ?>
</ol>
<?php else: ?>
<p>No bookings yet.</p>
<?php endif; ?>
</body></html>