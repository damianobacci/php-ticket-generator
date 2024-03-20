<?php

require_once 'lib/common.php';
require_once 'lib/install.php';

if ($_POST) {
    $pdo = getPDO();
    populateEvents($pdo);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Content population</title>
        <?php require 'templates/head.php' ?>
    </head>
    <body>
       <p>Click the install button to reset the database.</p>

            <form method="post">
                <input
                    name="install"
                    type="submit"
                    value="Install"
                />
            </form>
    </body>
</html>