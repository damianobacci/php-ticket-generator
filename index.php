<?php

require_once 'lib/common.php';

$pdo = getPDO();
$data = fetchEvents($pdo);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Ticket Generator</title>
    <?php require 'templates/head.php' ?>
</head>
<body>
    <?php require 'templates/navbar.php' ?>
    <h1>Generate Your Event Ticket</h1>
    <form action="generate_ticket.php" method="POST">
        <p>
        <label for="name">Please select an event:</label>
        <select name="event">
            <?php foreach($data as $event): ?>
           <option value="<?= $event["name"] ?>"><?= $event["name"] ?></option> 
           <?php endforeach; ?>
        </select>
        </p>
        <p>
        <label for="name">Your Name:</label>
        <input type="text" name="name" required></p>
        <input type="submit" value="Generate Ticket">
    </form>
</body>
</html>