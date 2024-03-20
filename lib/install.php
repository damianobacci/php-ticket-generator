<?php

function populateEvents(PDO $pdo)
{
    // Get a couple of useful project paths
    $root = getRootPath();
    $database = getDatabasePath();
    $error = '';

    if (is_readable($database) && filesize($database) > 0)
    {
        $error = 'Please delete the existing database manually before installing it afresh';
    }

    if (!$error)
    {
        $createdOk = @touch($database);
        if (!$createdOk)
        {
            $error = sprintf(
                'Could not create the database, please allow the server to create new files in \'%s\'',
                dirname($database)
            );
        }
    }

    if (!$error)
    {
        $sql = file_get_contents($root . '/data/init.sql');

        if ($sql === false)
        {
            $error = 'Cannot find SQL file';
        }
    }

    if (!$error)
    {
        $result = $pdo->exec($sql);
        if ($result === false)
        {
            $error = 'Could not run SQL: ' . print_r($pdo->errorInfo(), true);
        }
    }
}