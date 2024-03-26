<?php
require_once 'lib/common.php';

if ($_POST) {
    $pdo = getPDO();
    addEvent($pdo, $_POST['name'], $_POST['location'], $_POST['date'], $_POST['description']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require 'templates/head.php' ?>
    </head>
    <body>
        <?php require 'templates/navbar.php' ?>
        <header><h1>Add an event</h1></header>

<?php if($_POST) : ?>
    <section>
        <p>Event added!</p>
        <p><a href="add-event.php">Add another one?</a></p>
    </section>
    </body>
</html>

<?php else : ?>

    <section>
        <form action="add-event.php" method="POST">
        <p>
        <label for="name">Name of the event: </label>
        <input type="text" name="name" required>
        </p>
        <p>
        <label for="location">Location: </label>
        <input type="text" name="location" required></p>
        <p>
        <label for="description">Description: </label>
        <input type="text" name="description" required></p>
        <p>
        <label for="date">Date: </label>
        <input type="date" name="date" required></p>
        <input type="submit" value="Add Event">
    </form>
    </section>
</body>
</html>
<?php endif; ?>