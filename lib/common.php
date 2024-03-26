<?php

/**
 * Gets the root path of the project
 * 
 * @return string
 */
function getRootPath()
{
    return realpath(__DIR__ . '/..');
}

/**
 * Gets the full path for the database file
 * 
 * @return string
 */
function getDatabasePath()
{
    return getRootPath() . '/data/data.sqlite';
}

/**
 * Gets the DSN for the SQLite connection
 * 
 * @return string
 */
function getDsn()
{
    return 'sqlite:' . getDatabasePath();
}

/**
 * Gets the PDO object for database access
 * 
 * @return \PDO
 */
function getPDO()
{
    $pdo = new PDO(getDsn());

    // Foreign key constraints need to be enabled manually in SQLite
    $result = $pdo->query('PRAGMA foreign_keys = ON');
    if ($result === false)
    {
        throw new Exception('Could not turn on foreign key constraints');
    }

    return $pdo;
}

function fetchEvents(PDO $pdo) {
    $sql = "
    SELECT
        name, date, location, description
    FROM
        events
    ";
    $stmt = $pdo->query($sql);
    if ($stmt === false) {
        throw new Exception('There was a problem running this query');
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchSpecificEvent(PDO $pdo, string $name) {
    $sql = "
    SELECT
        date, location, description
    FROM
        events
    WHERE
        name = :name
    ";
    $stmt = $pdo->prepare($sql);
    if (!$stmt) {
        throw new Exception('There was a problem preparing this query');
    }
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    return  $eventData = $stmt->fetch(PDO::FETCH_ASSOC);
}

function formatDate(string $sqlDate) {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $sqlDate);

    return $date->format('d M Y');
}