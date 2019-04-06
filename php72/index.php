<?php

if (!getenv('SQL_DSN') || !getenv('SQL_USER') || false === getenv('SQL_PASSWORD')) {
    die('Set SQL_DSN, SQL_USER, and SQL_PASSWORD environment variables');
}

$dsn = getenv('SQL_DSN');
$user = getenv('SQL_USER');
$password = getenv('SQL_PASSWORD');

// create the PDO client
$db = new PDO($dsn, $user, $password);
$results = $db->query('SELECT title, body from posts;');
?>

<html>
    <body>
        <?php if ($results->rowCount() > 0): ?>
            <h2>Posts</h2>
            <?php foreach ($results as $row): ?>
                <div>
                    <h5> <?= $row['title'] ?></h5>
                    <p><?= $row['body'] ?></p>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </body>
</html>
