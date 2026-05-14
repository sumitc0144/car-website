<?php
$selectedSound = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'engine') {
echo '<a href="white cura nsx.html">Return</a>';

            $selectedSound = 'acura.mp3';
           }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Controls</title>
  <style>
    body {
      background: #111;
      color: #fff;
       }

      </style>
</head>
<body>
  
  <?php if ($selectedSound && isset($_POST['submit']) && $_POST['submit'] === 'start'): ?>
    <audio autoplay>
      <source src="<?php echo htmlspecialchars($selectedSound); ?>" type="">
    </audio>
  <?php endif; ?>
</center>
</body>
</html>
