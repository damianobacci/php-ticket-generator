<?php

require_once 'lib/common.php';

$pdo = getPDO();
$data = fetchEvents($pdo);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Ticket Generator</title>
</head>
<body>
    <h1>Generate Your Event Ticket</h1>
    <form action="generate_ticket.php" method="POST">
        <select name="event">
            <?php foreach($data as $event): ?>
           <option value="<?= $event["name"] ?>"><?= $event["name"] ?></option> 
           <?php endforeach; ?>
        </select>
        <p>
        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" required></p>
        <input type="submit" value="Generate Ticket">
    </form>
</body>
</html>