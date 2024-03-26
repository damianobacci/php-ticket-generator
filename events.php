<?php
require_once 'lib/common.php';

$pdo = getPDO();
$data = fetchEvents($pdo);

?>

<!DOCTYPE html>
<html>
    <head>
        <?php require 'templates/head.php' ?>
        <style>
            table {
  border-collapse: collapse;
  border: 2px solid rgb(140 140 140);
  font-family: sans-serif;
  font-size: 0.8rem;
  letter-spacing: 1px;
}

caption {
  caption-side: bottom;
  padding: 10px;
  font-weight: bold;
}

thead,
tfoot {
  background-color: rgb(228 240 245);
}

th,
td {
  border: 1px solid rgb(160 160 160);
  padding: 8px 10px;
}

tbody > tr:nth-of-type(even) {
  background-color: rgb(237 238 242);
}


        </style>
    </head>
    <body>
        <?php require 'templates/navbar.php' ?>
    </body>
    <header><h1>All events</h1></header>
    <section>
        <table>
            <thead>
            <tr>
                <th scope="col">Event</th>
                <th scope="col">Date</th>
                <th scope="col">Place</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($data as $event): ?>
                    <tr>
                    <th scope="row"><?= $event["name"] ?></th>
                    <td><?= formatDate($event["date"]) ?></td>
                    <td><?= $event["location"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>